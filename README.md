# Freelancer
This web-hacking challenge is a homage to the great game Freelancer and was created for the challenge-based Hack.lu CTF 2011 competition. It is based on PHP and MySQL. Keep in mind that this code is vulnerable (on purpose). The goal is to find and exploit the bug.

## Story
    Hey, you are a Lane Hacker, right? I got a job for you. Ever heard of the Perth Station? They just installed a new security system. It looks pretty solid, but I have a feeling it has a few bugs. I tried to hack it myself, but I can't seem to break in. You might have better luck.
    I know they are delivering a huge shipment of cardamine soon, I just need the administration key to determine when and where. So if you can get me the key you'll get more than enough credits. You can find it at the Dealer interface, but you have to be authorized. I'll send you the updated sourcecode, maybe that'll help.

## Installation
There needs to be a set up version of the challenge with unknown passwords. Create a MySQL database (database_layout.sql) and update the settings in /public/config.php. Now move the content of /public to a web-accessible directory and the installation is complete.

## Sources
/public/images/{cardamine.png,food.png,h-fuel.png,water.png}
 - Freelancer, Digital Anvil

/public/images/{dealer.png,logged*.png}
 - http://openiconlibrary.sourceforge.net/

/public/images/background.jpg
 - http://gnailasil.blogspot.com/2010/04/star-trek-online-concepts.html
