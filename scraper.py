#!C:\Users\agord\AppData\Local\Programs\Python\Python310\python.exe 

from pyexpat import model
from weakref import proxy
import mysql.connector
import requests 
from bs4 import BeautifulSoup



#have to set an user agent to bypass bot blockers for webscraping 
#URLs to use for webscraper
#refs
urlGEREF= "https://www.ajmadison.com/b.php/GE%3B962/template~hybrid_list_01%3Brpp~20%3BN~4294392749+4294967291"
urlHaierREF="https://www.ajmadison.com/b.php/Haier%3B962/template~hybrid_list_01%3Brpp~20%3BN~4294392749+4294967276"
urlCafeREF="https://www.ajmadison.com/b.php/Cafe%3B962/template~hybrid_list_01%3Brpp~20%3BN~4294392749+4294346367"
urlHotpointREF="https://www.ajmadison.com/b.php/Hotpoint%3B962/template~hybrid_list_01%3Brpp~20%3BN~4294392749+4294967251"

#ranges
urlGERANGE="https://www.ajmadison.com/ge-ranges/f"
urlHaierRANGE="https://www.ajmadison.com/haier-ranges/f"
urlHotpointRANGE="https://www.ajmadison.com/hotpoint-ranges/f"
urlCafeRANGE="https://www.ajmadison.com/b.php/Cafe%3BRanges/N~25+4294346367"

#dishwashers
urlGEDISH="https://www.ajmadison.com/ge-dishwashers/f"
urlHaierDISH="https://www.ajmadison.com/haier-dishwashers/f"
urlHotpointDISH="https://www.ajmadison.com/hotpoint-dishwashers/f"
urlCafeDISH="https://www.ajmadison.com/b.php/Cafe%3BDishwashers/N~64+4294346367"


#microwaves
urlGEMICRO="https://www.ajmadison.com/b.php/GE%3BMicrowaves/N~28+4294967291"
urlHaierMICRO="https://www.ajmadison.com/b.php/Haier%3BMicrowaves/N~28+4294967276"
urlHotpointMICRO="https://www.ajmadison.com/b.php/Hotpoint%3BMicrowaves/N~28+4294967251"
urlCafeMICRO="https://www.ajmadison.com/b.php/Cafe%3BMicrowaves/N~28+4294346367"

#washers
urlGEWASHER="https://www.ajmadison.com/b.php/GE%3BWashers/N~37+4294967291"
urlHaierWASHER="https://www.ajmadison.com/b.php/Haier%3BWashers/N~37+4294967276"
urlHotpointWASHER="https://www.ajmadison.com/b.php/Hotpoint%3BWashers/N~37+4294967251"



#Dryers
urlGEDRYER="https://www.ajmadison.com/b.php/GE%3BDryers/N~39+4294967291"
urlHaierDRYER="https://www.ajmadison.com/b.php/Haier%3BDryers/N~39+4294967276"
urlHotpointDRYER="https://www.ajmadison.com/b.php/Hotpoint%3BDryers/N~39+4294967251"


modelarray=[]
modelarray1=[]
modelarray2=[]
modelarray3=[]
modelarray4=[]
modelarray5=[]



#if no output then go to https://brightdata.com/blog/how-tos/user-agents-for-web-scraping-101#:~:text=%20List%20of%20User-Agents%20for%20scraping%20%201,Wget%3A%20Wget%2F1.15%20%28linux-gnu%29%202%20Curl%3A%20curl%2F7.35.0%20More%20 
# and change user agent

myheaders= { 
  'User-Agent': 'MGoogle Nexus: Mozilla/5.0 (Linux; U; Android-4.0.3; en-us; Galaxy Nexus Build/IML74K) AppleWebKit/535.7 (KHTML, like Gecko) CrMo/16.0.912.75 Mobile Safari/535.7',
  'Accept-Language': 'en-GB,en;q=0.5',
  'Referer': 'https://Facebook.com',
  'DNT': '1'
  }
mydb= mysql.connector.connect(host="localhost", user="root",password="",database="takeoff_db")

sqlscript= "insert into product_tbl(Model_Number, Product_Type) VALUES (%s, %s)"
cursor= mydb.cursor()



def webScrapToMySQLREF (url) :
  r= requests.get(url,headers=myheaders) #sending a request to server
  soup =BeautifulSoup(r.content,'html.parser')
  lists= soup.find_all('div',class_="py1 mb1 divided border-gray-4 list-product clearfix js-child-picker")
  for list in lists:
    modelnumber=list.find('div',class_="inline-block gray-5 clearfix f11").text
    modelarray.append(modelnumber)
    for i in modelarray:
      print(i,"REF")
      val= (i,"REF")
    try:
      cursor.execute(sqlscript,val)
      mydb.commit()
      print(cursor.rowcount, "details inserted")
      
    except:
      pass
    finally:
      pass
    
#calling webscraper functions for refrigerator pages 
webScrapToMySQLREF(urlGEREF)
webScrapToMySQLREF(urlCafeREF)
webScrapToMySQLREF(urlHotpointREF)
webScrapToMySQLREF(urlHaierREF)
  

def webScrapToMySQLRANGE (url) :
  r= requests.get(url,headers=myheaders) #sending a request to server
  soup =BeautifulSoup(r.content,'html.parser')
  lists= soup.find_all('div',class_="py1 mb1 divided border-gray-4 list-product clearfix js-child-picker")

  for list in lists:
    modelnumber=list.find('div',class_="inline-block gray-5 clearfix f11").text
    modelarray1.append(modelnumber)
    for models in modelarray1:
      print(models,"RANGE")
      val= (models,"RANGE")
    
    try:
      cursor.execute(sqlscript,val)
      print(cursor.rowcount, "details inserted")
      #mydb.commit()
    except:
      pass
    finally:
      pass

#calling webscraper functions for range pages 
webScrapToMySQLRANGE(urlGERANGE)
webScrapToMySQLRANGE(urlHaierRANGE)
webScrapToMySQLRANGE(urlHotpointRANGE)
webScrapToMySQLRANGE(urlCafeRANGE)


def webScrapToMySQLMICRO (url) :
  r= requests.get(url,headers=myheaders) #sending a request to server
  soup =BeautifulSoup(r.content,'html.parser')
  lists= soup.find_all('div',class_="py1 mb1 divided border-gray-4 list-product clearfix js-child-picker")
  for list in lists:
    modelnumber=list.find('div',class_="inline-block gray-5 clearfix f11").text
    modelarray2.append(modelnumber)
    for i in modelarray2:
      print(i,"MICRO")
      val= (i,"MICRO")
    try:
      cursor.execute(sqlscript,val)
      
      print(cursor.rowcount, "details inserted")
      mydb.commit()
      
    except:
      pass
    finally:
      pass

#calling webscraper functions for MICROWAVE pages
webScrapToMySQLMICRO(urlGEMICRO)
webScrapToMySQLMICRO(urlHaierMICRO)
webScrapToMySQLMICRO(urlHotpointMICRO)
webScrapToMySQLMICRO(urlCafeMICRO)

def webScrapToMySQLDISH (url) :
  r= requests.get(url,headers=myheaders) #sending a request to server
  soup =BeautifulSoup(r.content,'html.parser')
  lists= soup.find_all('div',class_="py1 mb1 divided border-gray-4 list-product clearfix js-child-picker")
  for list in lists:
    modelnumber=list.find('div',class_="inline-block gray-5 clearfix f11").text
    modelarray3.append(modelnumber)
    for i in modelarray3:
      print(i,"DISH")
      val= (i,"DISH")
    try:
      cursor.execute(sqlscript,val)
      
      print(cursor.rowcount, "details inserted")
      mydb.commit()
      
    except:
      pass
    finally:
      pass

webScrapToMySQLDISH(urlGEDISH)
webScrapToMySQLDISH(urlHaierDISH)
webScrapToMySQLDISH(urlHotpointDISH)
webScrapToMySQLDISH(urlCafeDISH)

def webScrapToMySQLWASHER (url) :
  r= requests.get(url,headers=myheaders) #sending a request to server
  soup =BeautifulSoup(r.content,'html.parser')
  lists= soup.find_all('div',class_="py1 mb1 divided border-gray-4 list-product clearfix js-child-picker")
  for list in lists:
    modelnumber=list.find('div',class_="inline-block gray-5 clearfix f11").text
    modelarray4.append(modelnumber)
    for i in modelarray4:
      print(i,"WASHER")
      val= (i,"WASHER")
    try:
      cursor.execute(sqlscript,val)
      
      print(cursor.rowcount, "details inserted")
      mydb.commit()
      
    except:
      pass
    finally:
      pass

webScrapToMySQLWASHER(urlGEWASHER)
webScrapToMySQLWASHER(urlHaierWASHER)
webScrapToMySQLWASHER(urlHotpointWASHER)

def webScrapToMySQLDRYER(url) :
  r= requests.get(url,headers=myheaders) #sending a request to server
  soup =BeautifulSoup(r.content,'html.parser')
  lists= soup.find_all('div',class_="py1 mb1 divided border-gray-4 list-product clearfix js-child-picker")
  for list in lists:
    modelnumber=list.find('div',class_="inline-block gray-5 clearfix f11").text
    modelarray5.append(modelnumber)
    for i in modelarray5:
      print(i,"DRYER")
      val= (i,"DRYER")
    try:
      cursor.execute(sqlscript,val)
      
      print(cursor.rowcount, "details inserted")
      mydb.commit()
      
    except:
      pass
    finally:
      pass


webScrapToMySQLDRYER(urlGEDRYER)
webScrapToMySQLDRYER(urlHaierDRYER)
webScrapToMySQLDRYER(urlHotpointDRYER)



mydb.close()