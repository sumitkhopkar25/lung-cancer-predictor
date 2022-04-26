import MySQLdb
import csv

cancer_attributes = []
cancer_attribute_value = []

def get_user_info():
    
    db = MySQLdb.connect  ("localhost","root","","lung_cancer")
    query = "SELECT * FROM user_info ORDER BY id DESC"
    cursor = db.cursor()
    cursor.execute(query)
    data = cursor.fetchone()
    global cancer_attributes
    cancer_attributes = [i[0] for i in cursor.description]

    for row in data:
        cancer_attribute_value.append(row);
        
def write_info_to_dataset():
    
    myData = [cancer_attribute_value]
    myFile = open('C:/xampp5/htdocs/be_project/dataset/temp.csv', 'w')
    
    with myFile:
        writer = csv.writer(myFile)
        writer.writerows(myData)
        print("Writing complete")
        
def clear_temp_dataset():
    
    myFile = open('C:/xampp5/htdocs/be_project/dataset/temp.csv', 'w')
    
    with myFile:
        writer = csv.writer(myFile)
        writer.writerows("")
        print("Clearing complete")

def append_to_train_dataset():
    
    clear_temp_dataset()
    myData = [cancer_attribute_value]
    myFile = open('C:/xampp5/htdocs/be_project/dataset/final_dataset.csv', 'a', newline='')
    
    with myFile:
        writer = csv.writer(myFile)
        writer.writerows(myData)
        print("Writing complete")
        
        