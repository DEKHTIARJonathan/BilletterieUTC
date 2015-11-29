::PROXY CONFIGURATION
set http_proxy=http://proxyweb.utc.fr:3128
set https_proxy=https://proxyweb.utc.fr:3128

set PATH=%PATH%;C:\wamp\www\badgingServer\Install\swigwin-3.0.7

::call "C:\Anaconda\Scripts\anaconda.bat"
conda update conda -y
conda install pip -y 
pip install bottle paste dict2xml
cd pyscard
python setup.py build_ext install

PAUSE