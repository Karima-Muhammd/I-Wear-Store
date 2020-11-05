
function run()
{
    var my_request;
    if(window.XMLHttpRequest)  //lw window or browser el el file mbfto7 3leh byd3m el XmlHttpRequest
    {
        my_request = new XMLHttpRequest() //make request
    }
    else
    {
        my_request = new ActiveXObject("Microsoft.XMLHttp");
    }
    my_request.onreadystatechange=function (){
        var myDiv=document.getElementById('myinfo')
        myDiv.innerHTML=my_request.responseText;

    }
    my_request.open('GET','select.php',true);
    my_request.send();
}

