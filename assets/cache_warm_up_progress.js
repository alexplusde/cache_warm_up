var es;
 
function startTask() {
    es = new EventSource('/index.php?rex-api-call=cache_warm_up');
    document.getElementById('results').innerHTML = "";

    var pBarSuccess = document.getElementById('cache_warmup_progress_bar_success');
    var pBarValueSuccess = document.getElementById('cache_warmup_progress_bar_success_value');
    var pBarDanger = document.getElementById('cache_warmup_progress_bar_danger');
    var pBarValueDanger = document.getElementById('cache_warmup_progress_bar_danger_value');

    pBarSuccess.classList.add("progress-bar-striped");
    pBarDanger.classList.add("progress-bar-striped");
 
    var StopButton = document.getElementById('cache_warm_up_button_stop');

    StopButton.removeAttribute('disabled');

    //a message is received
    es.addEventListener('message', function(e) {
        var result = JSON.parse( e.data );
         

        if(e.lastEventId == '✅') {
            addLog('✅', '🥵', 'Fertig', '');
            pBarSuccess.classList.remove("progress-bar-striped");
            pBarDanger.classList.remove("progress-bar-striped");
            StopButton.setAttribute('disabled', 'disabled');

            es.close();
        }
        else {
            addLog(result.url, result.emoji, result.status, result.message);

            if(result.status == 200) {
                pBarSuccess.value = pBarSuccess.value + 1;
                pBarSuccess.style.width = (Math.floor(100 * (result.progress/result.total))) + '%';
                pBarValueSuccess.innerHTML   = result.progress  + "";
            } else {
                pBarDanger.value = pBarDanger.value + 1;
                pBarDanger.style.width = (Math.floor(100 * (result.progress/result.total))) + '%';
                pBarValueDanger.innerHTML   = result.progress  + "";
            }
        }
    });
     
    es.addEventListener('error', function(e) {
        addLog('❌', '😭', 'Addon-Fehler.', '');
        pBarSuccess.classList.remove("progress-bar-striped");
        pBarDanger.classList.remove("progress-bar-striped");
        StopButton.setAttribute('disabled', 'disabled');
        es.close();
    });
}
 
function stopTask() {
    addLog('❌', '🥶', 'Abgebrochen.', '');
    pBarSuccess.classList.remove("progress-bar-striped");
    pBarDanger.classList.remove("progress-bar-striped");
    var StopButton = document.getElementById('cache_warm_up_button_stop');
    StopButton.setAttribute('disabled', 'disabled');
    es.close();
}
 
function addLog(url, emoji, status, message) {
    var r = document.getElementById('results');
    r.innerHTML = '<tr><td>' + url + '</td><td>' + emoji + " " + status + '</td><td>' + message + '</td></tr>' + r.innerHTML;
}
