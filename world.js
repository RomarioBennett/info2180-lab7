window.onload = function(){
    

    var xmlHttp;
    var xmlHttp1;
    var lookupBttn = document.getElementById("lookup");
    var lookupcBttn = document.getElementById("lookupc");
    var Result = document.getElementById("result");
    var Result1 = document.getElementById("result1");
   

    lookupBttn.addEventListener('click',function(e){
        e.preventDefault();
        

        
        var country = document.getElementById("country").value;
        
         //Create request object
        xmlHttp  = new XMLHttpRequest();
    
        url = 'world.php?country='+ country;
        //url = 'index.php?search=' + search;
        
        //Receive a request
        
        xmlHttp.onreadystatechange = Request;
        xmlHttp.open('GET', url);
        //xmlHttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xmlHttp.send();
        
    });
    
    


    function Request(){
        if((xmlHttp.readyState === XMLHttpRequest.DONE) && (xmlHttp.status === 200))
        {
            
            //Output response
           //var response = xmlHttp.responseText;
           //alert(response);
           Result.innerHTML = xmlHttp.responseText;
        }
       
    }
    
    
    
     lookupcBttn.addEventListener('click',function(f){
        f.preventDefault();
        

        
        var context = document.getElementById("country").value;
        
         //Create request object
        xmlHttp1  = new XMLHttpRequest();
    
        url =  'world.php?country=&context=cities';
        //url = 'index.php?search=' + search;
        
        //Receive a request
        
        xmlHttp1.onreadystatechange = Request2;
        xmlHttp1.open('GET', url);
        //xmlHttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xmlHttp1.send();
        
    });
    
     function Request2(){
        if((xmlHttp1.readyState === XMLHttpRequest.DONE) && (xmlHttp1.status === 200))
        {
            
            //Output response
           //var response = xmlHttp.responseText;
           //alert(response);
           Result1.innerHTML = xmlHttp1.responseText;
        }
       
    }


};