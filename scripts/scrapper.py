#!/usr/bin/env python
from bs4 import BeautifulSoup
import requests
import codecs
import json

html_file = requests.get('https://civica-inc.hiringthing.com/').text
content = BeautifulSoup(html_file, 'lxml')
jobs = content.find_all('div', class_='job-container')

translator = str.maketrans({chr(10): '', chr(9): ''})

job_list = []
with codecs.open('./tmp/jobs.json','w', encoding='utf-8') as write_file:
    for job in jobs:
        if job.find('h2'):
            job_title = job.find('h2').text.translate(translator)
        else:
            job_title = ''

        if job.find('div', class_='job-location'):
            job_location = job.find('div', class_='job-location').text.translate(translator)
        else:
            job_location = ''

        if job.find('div', class_='job-description'):
            job_description = job.find('div', class_='job-description').text.translate(translator)
        else:
            job_description = ''

        if job.find('a', class_='mobile-apply-link').attrs['href']:
            job_link = job.find('a', class_='mobile-apply-link').attrs['href'].translate(translator)
        else:
            job_link = ''

        job_dict = {"job_title":job_title,"job_location":job_location,"job_description":job_description,"job_link":job_link}

        job_list.append(job_dict) 

        # print(job_list)

        json.dump(job_dict, write_file, indent=4, ensure_ascii=False)
    # -------------------
    # fp = open('./tmp/mydict.json', 'w+')
    # json.dump(json_object, fp)
    # with open('convert.txt', 'w') as convert_file:
    #  convert_file.write(json.dumps(details))

    # print(job_list)