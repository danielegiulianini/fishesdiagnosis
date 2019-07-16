# FishesDiagnosis

A web app for supporting the diagnosis of marine fauna diseases.

##Installation
Taking the code as it is, the repository must be downloaded inside the root directory of hosting web server machine.
References in code must be updated otherwise.  
A textual dump of some example data is inside the root folder of the repository (file named patologiepesci.sql).
The database contains patologic states basic info and 2 users already registered: 1 admin user and 1 normal user.
Their credentials follows:  
Admin  
username: admin  
password: admin  

Normal user  
username: test2  
password: test  

The database contains also 2 examples of reports with some test data inside them.

##Italiano 

###Indicazioni per l’installazione tramite piattaforma xampp

Scaricare xampp. All’interno della cartella xampp, cercare la cartella htdocs. Una volta entrati in htdocs (che è la root folder del server apache), digitare da terminale: git clone https://bitbucket.org/danielegiulianini/fishesdiagnosis per scaricare il repository.
Dopo aver avviato xampp, dal pannello di controllo avviare Apache server e MySql. 
Ora, utilizzando il browser e digitando nella barra di ricerca la stringa: localhost/fishesdiagnosis/php/commons/pages/loginPage.php, si accede alla login page e si può navigare.
