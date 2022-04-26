# Prediction of Lung Cancer using Artificial Neural Networks
The main idea of the project is to help a potential cancer patient by giving him/her the risk percentage to be diagnosed with lung cancer, so that he can change his lifestyle accordingly and avoid cancer. This system can be used by hospitals to help such potential patients by giving them treatment and proper advice before they are diagnosed with cancer.

## Installation
To use this project, first clone the repo on your device using the command below:

```
git init
```
```
git clone https://github.com/sumitkhopkar25/lung-cancer-predictor.git
```

Requirements - 
1. XAMPP (with MySQL support)
2. Python 2.x or above

Place the project folder in the htdocs/ folder in XAMPP. 

## Usage
Run XAMPP and navigate to localhost/lung-cancer-predictor on your browser. Run the run_program.cmd file which starts the model_run.py file to constantly check whether user has submitted his/her data for prediction.

On the initial webpage the user would be requested to create his/her profile. After this step the user can provide his/her details in a questionnaire. On clicking Submit the data is propagated through a FeedForward Network model (which has already been trained and saved on the historical data of the patient available). The output layer of this Network provides the prediction percentage based on the data provided by the user. This is acquired by the user in the form of an email.

## Acknowledgments
Purva Kulkarni, Neil Gupte and Anvay Sonpimple
