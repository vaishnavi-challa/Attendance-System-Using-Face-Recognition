# Face-Recoognition-Attendance-System

## Team Project

This is a standalone web-app used for classification of planetary data. The web-app can be setup by following the shown steps.

### Prerequisites

1. Linux system.
2. Python / Python3 installed.
3. Latest version of `pip` installed.

### Steps

1. Open your bash terminal.
2. Clone this repository in any directory of your choice.

```
git clone https://github.com/shashankp28/soi-space-ds.git
```

3. Run the following command to move into the cloned repository.

```
cd soi-space-ds
```
4. Run ***one*** of these commands to install tkinter, depending upon your system's python configuration (python / python3).

```
sudo apt-get install python3-tk
```
```
sudo apt-get install python-tk
```

5. Execute the **_setup.sh_** file to install dependencies and create `run.sh` file.

```
chmod 755 setup.sh && ./setup.sh
```

_When prompted, choose whether to install packages on a virtual environment. **yes** recommended_

6. Host the web-app locally using the following command

```
./run.sh
```

Once the setup is complete, the web-app can be opened using _loalhost_ **_[Port 8501](http://localhost:8501)_**.
**Use Ctrl+C inside the terminal to stop.**

### Important

**_Once the app is setup, you can host the web-app using only step 5._**

### Using the application

1. Initially upload a csv file in the format shown in the web-app.
2. Next navigate to the **_Docs_** tab from the side nav bar.
3. Detailed instructions on using the application is given, including a short video.

### Note

- The notebook and data used for training can be found under the following directories:

  1. `ML/SDS_MODEL.ipynb`
  2. `ML/data_full.csv`
     <br>
     <br>

- Documentation for ML model is named as `Documentation_Kepler.pdf`
- Documentation for the Web-App can be found under the `Docs` tab of the Web-App itself.
- The predictions are present in the `predicted` coloumn in downloaded files.

_The Random Forest Model couldn't be incorporated as it's size was around 3.5 GB and would not be feasible for a stand-alone application. The model can be run on Google Colab._

- Link to Model: [Random Forest](https://drive.google.com/file/d/1MTWGQinxfvbYmVzOYc4AGZO26kWE11xA/view?usp=sharing)
