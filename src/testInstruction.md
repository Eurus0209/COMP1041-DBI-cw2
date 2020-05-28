### Guidance of opening website

Copy the link below to Chrome or Firefox browser to open the website.  

http://cslinux.nottingham.edu.cn/~shyhl11/src/index.php

### Database information

Here are some existent users' information, you can log in use these account to view their data. 

| Role     | Username    | Password |
| -------- | ----------- | -------- |
| manager  | manager     | 111      |
| customer | america1    | 111      |
| customer | canada1     | 111      |
| customer | china1      | 111      |
| customer | china2      | 111      |
| customer | japan1      | 111      |
| customer | korea1      | 111      |
| sale rep | rep         | 111      |
| sale rep | repAmerica1 | 111      |
| sale rep | repCanada1  | 111      |
| sale rep | repCanada2  | 111      |
| sale rep | repChina1   | 111      |
| sale rep | repChina2   | 111      |
| sale rep | repJapan1   | 111      |
| sale rep | repKorea1   | 111      |
| sale rep | repKorea2   | 111      |



### Test data

#### 1. customer system test

| test index |             test functionality              | data input                                                   |                         screen shot                          |
| :--------: | :-----------------------------------------: | ------------------------------------------------------------ | :----------------------------------------------------------: |
|     1      |         sign up </br>(correct one)          | test1</br>testCase1</br>12322123</br> 12345678900</br>123@abc.com</br>111</br>111</br>Japan | ![image-20200528222334673](testInstruction/image-20200528222334673.png) |
|     2      |   sign up </br>(handle user name repeat)    | test1</br>testCase2</br> 11111</br> 11111111111</br>456@abc.com</br>111</br>111</br>China | ![image-20200528222707135](testInstruction/image-20200528222707135.png) |
|     3      |  sign up </br>(handle wrong format input)   | test1+0</br>testCase3</br> 11111</br> 123</br>456@abc</br>111</br>111</br>China | ![image-20200528223342563](testInstruction/image-20200528223342563.png) |
|     4      |          log in</br>(correct one)           | china1</br> 111                                              | ![image-20200528223519720](testInstruction/image-20200528223519720.png) jump to start page |
|     5      |          log in</br>(correct one)           | england1</br> 111                                            | ![image-20200528235826625](testInstruction/image-20200528235826625.png)jump to start page |
|     6      |         log in</br>(incorrect one)          | noregister</br>123                                           | ![image-20200528223618464](testInstruction/image-20200528223618464.png) |
|     7      |          purchase</br>(valid one)           | < use test  4 firstly> </br>20</br>20</br>30</br>repChina1   | ![image-20200529000056651](testInstruction/image-20200529000056651.png) |
|     8      |      purchase</br>(handle no sale rep)      | < use test 5 firstly></br>20</br>20</br>30</br>              | ![image-20200529000009249](testInstruction/image-20200529000009249.png) |
|     9      |   purchase</br>(handle quantities are 0)    | < use test  4 firstly></br>0</br>0</br>0</br>                | ![image-20200529000436747](testInstruction/image-20200529000436747.png) |
|     10     |                view ordering                | < use test  4 firstly, click button 'Ordering'>              | ![image-20200529001121697](testInstruction/image-20200529001121697.png) |
|     11     |               cancel ordering               | < use test  7 firstly>                                       | ![image-20200529001254633](testInstruction/image-20200529001254633.png) |
|     12     |          view personal information          | < use test  4 firstly, click button 'Information'>           | ![image-20200529001401964](testInstruction/image-20200529001401964.png) |
|     13     |    change information</br>(correct one)     | < use test  4 firstly></br> 456@abc.com</br>18055220303</br>1111</br>1111 | ![image-20200529001519671](testInstruction/image-20200529001519671.png) |
|     14     | change information</br>(handle wrong input) | < use test  4 firstly></br> 456@abc</br>1805522</br>1111</br>12 | ![image-20200529001710510](testInstruction/image-20200529001710510.png) |
|     15     |                   logout                    | < use test  4 firstly, click button 'Logout'>                | ![image-20200529002129939](testInstruction/image-20200529002129939.png) |



#### 2. sale rep system test

| test index |    test functionality     | data input        |                         screen shot                          |
| :--------: | :-----------------------: | ----------------- | :----------------------------------------------------------: |
|     16     |           login           | repChina1</br>111 | ![image-20200529003031703](testInstruction/image-20200529003031703.png) |
|            | view personal information |                   | ![image-20200529004037090](testInstruction/image-20200529004037090.png) |
|            |   view quota situation    |                   | ![image-20200529003243055](testInstruction/image-20200529003243055.png) |
|            |                           |                   | ![image-20200529003645553](testInstruction/image-20200529003645553.png) |
|            |                           |                   | ![image-20200529003708194](testInstruction/image-20200529003708194.png) |
|            |                           |                   | ![image-20200529003831199](testInstruction/image-20200529003831199.png) |
|            |                           |                   | ![image-20200529004107686](testInstruction/image-20200529004107686.png) |
|            |                           |                   | ![image-20200529004123502](testInstruction/image-20200529004123502.png) |
|            |                           |                   |                                                              |
|            |                           |                   |                                                              |
|            |                           |                   |                                                              |
|            |                           |                   |                                                              |
|            |                           |                   |                                                              |



#### 3. customer system

| test index | test functionality | data input        |                         screen shot                          |
| :--------: | :----------------: | ----------------- | :----------------------------------------------------------: |
|            |       login        | repChina1</br>111 | ![image-20200529003031703](testInstruction/image-20200529003031703.png) |
|            |                    |                   | ![image-20200529004647266](testInstruction/image-20200529004647266.png) |
|            |                    |                   | ![image-20200529004715325](testInstruction/image-20200529004715325.png) |
|            |                    |                   | ![image-20200529005005238](testInstruction/image-20200529005005238.png) |
|            |                    |                   | ![image-20200529005017286](testInstruction/image-20200529005017286.png) |
|            |                    |                   | ![image-20200529005156701](testInstruction/image-20200529005156701.png) |
|            |                    |                   | ![image-20200529005245873](testInstruction/image-20200529005245873.png) |
|            |                    |                   | ![image-20200529005453132](testInstruction/image-20200529005453132.png) |
|            |                    |                   | ![image-20200529005719697](testInstruction/image-20200529005719697.png) |
|            |                    |                   | ![image-20200529005750317](testInstruction/image-20200529005750317.png) |
|            |                    |                   | ![image-20200529005815941](testInstruction/image-20200529005815941.png) |
|            |                    |                   | ![image-20200529005900515](testInstruction/image-20200529005900515.png) |
|            |                    |                   | ![image-20200529005921658](testInstruction/image-20200529005921658.png) |
|            |                    |                   | ![image-20200529005930427](testInstruction/image-20200529005930427.png) |