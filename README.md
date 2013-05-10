steganos
=========================================


Internet Imgur spider using Outguess to detect steganography in the wild.


==========================================
Current assumptions (automate/include later):

-Assumes stegdetect has been installed.
(http://packages.ubuntu.com/hardy/amd64/stegdetect/download)

-Assumes php has been installed.

-Assumes file structure in same folder exists ./data/hits

-Images that match will be stored in ./data/hits with their corresponding imgur url.

-To run, put index.php in /var/www/html , start apache with php, then run php run.php.

-No output will be displayed while site is downloaded and images are extracted.

-Error messages from stegdetect within the system are fine - it just means unscannable images were selected (bmp/png etc.)

-Sofware is only collecting high confidence (***) hits.  This can be changed by changing what string the sofware searches for in stegdetect output.




TYPICAL RESULTS:
===========================
-1.2% high confidence hits.  Virtually always from Outguess or JPhide.
-Suspect most (all?) false positives.
-Future work: attept to bruteforce passwords on high confidence hits.
-Future work: add additional detection systems.
-Future work: Onion crawling over Tor.


Please report any interesting results. 