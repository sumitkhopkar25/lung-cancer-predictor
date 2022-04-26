import dataset_handling_module.db_to_dataset as dataset

# Data Preprocessing

# Importing the libraries
import numpy as np
import matplotlib.pyplot as plt
import pandas as pd
import tensorflow as tf

# Importing the dataset
def import_dataset():

    global X,y,X_missing,dataset
    dataset = pd.read_csv('C:/xampp5/htdocs/be_project/dataset/test2.csv')
    X = dataset.iloc[:, :-1].values
    X_missing = dataset.iloc[:, :].values
    y = dataset.iloc[:, -1].values
    return

def encode_categorical_data():

    global X,y

    # Encoding categorical data
    # Encoding the Independent Variable
    #OneHotEncoder is giving an error could not convert string to float in some cases
    from sklearn.preprocessing import LabelEncoder
    labelencoder_X = LabelEncoder()
    X[:, 2] = labelencoder_X.fit_transform(X[:, 2])
    X[:, 7] = labelencoder_X.fit_transform(X[:, 7])
    return
    
def fill_missing_data():

    global X,y
    
    # Taking care of missing data
    from sklearn.preprocessing import Imputer
    imputer = Imputer(missing_values = 'NaN', strategy = 'most_frequent', axis = 0)
    imputer = imputer.fit(X_missing[:, :])
    X_missing[:, :] = imputer.transform(X_missing[:, :])
    return
    
def split_train_test():
    
    global X_train, X_test, y_train, y_test
    global X,y
    
    # Splitting the dataset into the Training set and Test set
    from sklearn.model_selection import train_test_split
    X_train, X_test, y_train, y_test = train_test_split(X, y, test_size = 0.2, random_state = 0)
    return

def feature_scale():
    
    # Feature Scaling
    global X_train, X_test, y_train, y_test
    global X,y
    
    from sklearn.preprocessing import StandardScaler
    sc = StandardScaler()
    X_train = sc.fit_transform(X_train)
    X_test = sc.transform(X_test)
    return    

def visualize():
    
    global age, males, females
    males = 0
    females = 0
    age = []
    
    hist_fig = plt.figure(1)
    pie_fig = plt.figure(2)
    histogram = hist_fig.add_subplot(111)
    pie_chart = pie_fig.add_subplot(111)
    
    #visualize histogram for age groups having cancer
    
    for i in range(len(X)):
        
        if(y[i] == 1):
            
            age.append(X[i][0])
            
            if(X[i][1] == 1):
            
                males += 1
            
            else:
            
                females += 1
      
    histogram.set_title('Histogram for age groups having cancer')
    histogram.set_xlabel('Age group')
    histogram.set_ylabel('Number of people having cancer')
    histogram.hist(age, bins = 10, edgecolor = 'black', linewidth = 1.2)
    hist_fig.show()
    
    pie_chart.set_title('Pie-chart describing male-female ratio of cancer occurence')
    pie_labels = 'Male', 'Female'
    pie_sizes = [males, females]
    pie_chart.pie(pie_sizes, labels = pie_labels, autopct='%1.1f%%', shadow=True, startangle=90)
    pie_fig.show()
    
def remove_float():
    
    #print(int(dataset['bmi_curr'][0]))
    
    for record in range(len(dataset)):
    
        dataset['bmi_curr'][record] = int(dataset['bmi_curr'][record])
        dataset['cig_stop'][record] = int(dataset['cig_stop'][record])
        dataset['pack_years'][record] = int(dataset['pack_years'][record])
        print("written")
        
    print([dataset])
    
    dataset.to_csv('C:/xampp5/htdocs/be_project/dataset/temp_test2.csv', index=False)
    
def main():

    # preprocessor calls
    import_dataset()
    #visualize()
    #encode_categorical_data()
    #fill_missing_data()
    #split_train_test()
    #feature_scale()"""
    
    #tensor_flow()
    
if __name__== "__main__":
    main()
    

    
    

    




