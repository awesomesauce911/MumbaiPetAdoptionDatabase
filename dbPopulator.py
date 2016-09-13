
import csv, sqlite3

con = sqlite3.connect('FullDatabase.db')
cur = con.cursor()

with open('Data.csv','rb') as f: # `with` statement available in 2.5+
    # csv.DictReader uses first line in file for column headings by default
    dr = csv.DictReader(f) # comma is default delimiter
    to_db = [(i['Name'], i['Type of Animal'], i['Number of Animals'], i['Age in Months'], i['URL to Image'], i["Time Remaining (if urgent)"], i["Contact Number"], i['Writeup']) for i in dr]

cur.executemany("INSERT INTO DOGS3 VALUES (?, ?, ?, ?, ?, ?, ?, ?);", to_db)
con.commit()
con.close()
