#!/usr/bin/python

import sys
import mysql.connector
import time

if len(sys.argv)>0:
	var=sys.argv[1]
	
	print var

mydb = mysql.connector.connect(
  
  username="lukapando",
  password="Lucapanda99",
  host="localhost",
  database="slide_db"
)

mycursor = mydb.cursor()

mycursor.execute("SELECT * FROM Preset")

for x in mycursor:
  print(x)
  
  time.sleep(10)
