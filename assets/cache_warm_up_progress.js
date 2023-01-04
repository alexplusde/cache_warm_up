var es;
 
function startTask() {
    es = new EventSource('/index.php?rex-api-call=cache_warm_up');
     
    //a message is received
    es.addEventListener('message', function(e) {
        var result = JSON.parse( e.data );
         
        addLog(result.message);
         
        if(e.lastEventId == 'CLOSE') {
            addLog('Received CLOSE closing');
            es.close();
            var pBar = document.getElementById('progressor');
            pBar.value = pBar.max; //max out the progress bar
        }
        else {
            var pBar = document.getElementById('progressor');
            pBar.value = result.progress;
            var perc = document.getElementById('percentage');
            perc.innerHTML   = result.progress  + "%";
            perc.style.width = (Math.floor(pBar.clientWidth * (result.progress/100)) + 15) + 'px';
        }
    });
     
    es.addEventListener('error', function(e) {
        addLog('Error occurred');
        es.close();
    });
}
 
function stopTask() {
    es.close();
    addLog('Interrupted');
}
 
function addLog(message) {
    var r = document.getElementById('results');
    r.innerHTML += message + '<br>';
    r.scrollTop = r.scrollHeight;
}
