# -*- coding: utf-8 -*-
"""
Created on Sun Feb  4 20:36:57 2018

@author: user
"""

import tensorflow as tf
import numpy
import csv
import matplotlib.pyplot as plt
import pandas as pd
from sklearn.preprocessing import OneHotEncoder
from sklearn.model_selection import train_test_split
from sklearn.preprocessing import StandardScaler
from docx import Document
import unittest

class TestANN(unittest.TestCase):
    
    def test_data(self):
         self.assertTrue(data_check_count < 500)
         
    def test_features(self):
        self.assertNotEqual(features,0)

example_arr = []
example_arr_X = []
example_arr_y = []
accuracy_arr = []

per_epoch_batches = 5

curr_batch = 1   

data_check_count = 1 

n_nodes_hl1 = 12
n_nodes_hl2 = 12
n_nodes_hl3 = 12

n_classes = 2

x = tf.placeholder('float',[None,23])
y = tf.placeholder('float')

def read_from_dataset():
    
    global features
    
    filename_queue = tf.train.string_input_producer(["C:/xampp5/htdocs/be_project/dataset/test2.csv"])
    
    reader = tf.TextLineReader(skip_header_lines=1)
    key, value = reader.read(filename_queue)
    
    # Default values, in case of empty columns. Also specifies the type of the
    # decoded result.
    record_defaults = [[1], [1], [1], [1], [1], [1], [1], [1], [1], [1], [1], [1], [1], [1], [1], [1], [1], [1], [1], [1], [1], [1], [1], [1]]
    col1, col2, col3, col4, col5, col6,col7, col8, col9, col10, col11, col12, col13, col14, col15, col16, col17, col18, col19, col20, col21, col22, col23, col24 = tf.decode_csv(
        value, record_defaults=record_defaults)
    features = tf.stack([col1, col2, col3, col4, col5, col6,col7, col8, col9, col10, col11, col12, col13, col14, col15, col16, col17, col18, col19, col20, col21, col22, col23, col24])   
    
def iterate_through_batch():
    
    with tf.Session() as sess:
        global next_element, curr_batch
        
        for _ in range(curr_batch):
            
            sess.run(next_element)

        batch_total = next_element.eval()
        batch_total = numpy.hsplit(batch_total, [2,25])
        batch_x = batch_total[1]
        batch_y = batch_total[0]
        
        sc = StandardScaler()
        batch_x = sc.fit_transform(batch_x)
        
        curr_batch += 1
        
        #print(sess.run(next_element))
        
        return batch_x,batch_y
    
def create_batch():
    
    global dataset, next_element, X_test, y_test, X_train, y_train
    
    X_train = tf.data.Dataset.from_tensor_slices(dataset)
  
    batch = X_train.batch(100)
    
    iterator = batch.make_one_shot_iterator()
    next_element = iterator.get_next()
    
def prepare_dataset():
    
    with tf.Session() as sess:
        
        # Start populating the filename queue.
        
        global dataset, X_test, y_test
        coord = tf.train.Coordinator()
        threads = tf.train.start_queue_runners(coord=coord)
    
        for i in range(8519):
            
            example_arr_X.append(sess.run(features))
            
        coord.request_stop()
        coord.join(threads)
      
        dataset = numpy.asarray(example_arr_X)
        
        onehotencoder = OneHotEncoder(categorical_features = [23])
        dataset = onehotencoder.fit_transform(dataset).toarray()
        
        temp_dataset = numpy.hsplit(dataset, [2,25])
        X_total = temp_dataset[1]
        y_total = temp_dataset[0]
        
        X_train, X_test, y_train, y_test = train_test_split(X_total, y_total, test_size = 0.2, random_state = 42)
        
        sc = StandardScaler()
        X_train = sc.fit_transform(X_train)
        X_test = sc.transform(X_test)

def neural_net_model(data):
    
    hidden_1_layer = {'weights':tf.Variable(tf.random_normal([23,n_nodes_hl1])),'biases':tf.Variable(tf.random_normal([n_nodes_hl1]))}
    hidden_2_layer = {'weights':tf.Variable(tf.random_normal([n_nodes_hl1,n_nodes_hl2])),
		'biases':tf.Variable(tf.random_normal([n_nodes_hl2]))}
    hidden_3_layer = {'weights':tf.Variable(tf.random_normal([n_nodes_hl2,n_nodes_hl3])),
		'biases':tf.Variable(tf.random_normal([n_nodes_hl3]))}
    output_layer = {'weights':tf.Variable(tf.random_normal([n_nodes_hl3,n_classes])),
		'biases':tf.Variable(tf.random_normal([n_classes]))}

    l1 = tf.add(tf.matmul(data, hidden_1_layer['weights']),hidden_1_layer['biases'])
    l1 = tf.nn.relu(l1)

    l2 = tf.add(tf.matmul(l1, hidden_2_layer['weights']),hidden_2_layer['biases'])
    l2 = tf.nn.relu(l2)
	
    l3 = tf.add(tf.matmul(l2, hidden_3_layer['weights']),hidden_3_layer['biases'])
    l3 = tf.nn.sigmoid(l3)

    output = tf.matmul(l3, output_layer['weights']) + output_layer['biases']

    return output
    
def train_neural_network(x):
    
    global X_test,y_test, curr_batch,accuracy_arr, y_pred, output_probability, probs, output_single, prob_single
    prediction = neural_net_model(x)
    cost = tf.reduce_mean( tf.nn.softmax_cross_entropy_with_logits(labels = y, logits = prediction))
    output_probability = tf.nn.softmax(prediction)
    optimizer = tf.train.RMSPropOptimizer(learning_rate=0.001).minimize(cost)

    hm_epochs = 3

    with tf.Session() as sess:
        
        sess.run(tf.global_variables_initializer())

        for epoch in range(hm_epochs):
            
            epoch_loss = 0
            create_batch()
            
            for _ in range(per_epoch_batches):
                
                epoch_x,epoch_y  = iterate_through_batch()
                _,epoch_c = sess.run([optimizer, cost], feed_dict = {x: epoch_x, y: epoch_y})
                epoch_loss += epoch_c
                print("Total loss at current iteration : ",epoch_loss)
                
            print('Epoch', epoch+1, 'completed out of ', hm_epochs, 'loss: ', epoch_loss)
            correct = tf.equal(tf.argmax(prediction, 1), tf.argmax(y,1))
            accuracy = tf.reduce_mean(tf.cast(correct, 'float'))*100
            print('Accuracy:', accuracy.eval({x: X_test, y: y_test}))
            curr_batch = 1
            accuracy_arr.append(accuracy.eval({x: X_test, y: y_test}))
            output = sess.run(tf.argmax(prediction, 1), {x:X_test})

            probs = sess.run(output_probability, feed_dict={x: X_test})*100
            y_pred = output
    
        new_dataset = pd.read_csv("C:/xampp5/htdocs/be_project/dataset/temp.csv", header = None)        
        clear_temp()
        X_new = new_dataset.iloc[:, :].values
        output_single = sess.run(tf.argmax(prediction, 1), {x:X_new})
        prob_single = sess.run(output_probability, feed_dict={x: X_new})*100
        print(output_single)
        print(prob_single)
        prob_single = prob_single[0]
        prob_single = prob_single[1]
    write_to_docx(output_single, prob_single)
    visualize_accuracy()
    quit()
    
def write_to_docx(output, prob):
    
    document = Document()
    docx_string = 'Your percentage of risk of having cancer is '+str(prob)+'%'
    document.add_paragraph(docx_string)
    document.save('C:/xampp5/htdocs/be_project/python/demo.docx')
    print("written")
    
def clear_temp():
    
    myFile = open('C:/xampp5/htdocs/be_project/dataset/temp.csv', 'w')
    
    with myFile:
        writer = csv.writer(myFile)
        writer.writerows("")
        print("Clearing complete")
              
def visualize_accuracy():
    
    global accuracy_graph
    epoch = []
    accuracy = []
    
    fig = plt.figure()
    ax = fig.add_subplot(111)
    
    for index in range(len(accuracy_arr)):
        
        epoch.append(index)
        accuracy.append(accuracy_arr[index])
        
    ax.set_title('Accuracy change with respect to epochs')
    ax.set_xlabel('Accuracy(%)')
    ax.set_ylabel('Epochs')
    ax.plot(accuracy,epoch)
    
    return
    
def check_new_data():
    
    try:
        pd.read_csv("C:/xampp5/htdocs/be_project/dataset/temp.csv")
    except:
        return 0
    
    return 1
    
def run_ann():   
    read_from_dataset()
    prepare_dataset()
    train_neural_network(x)
    
def main():
    
    global data_check_count
    
    while(data_check_count < 500):
        
        if(check_new_data() != 1):
            
            print ("No new data")
            data_check_count += 1
            main()
        
        else:
            run_ann()
    
    quit()  
        
if __name__== "__main__":
    unittest.main()
