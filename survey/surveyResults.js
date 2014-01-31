   var pieValueYes = 40;
   var pieValueNo = 60;
    function doSomething() {
                var value = 24;
                var phraseYes = "% chose YES";
                var phraseNo = "% chose NO";
                document.getElementById('percent').innerHTML = pieValueYes + phraseYes;
                document.getElementById('percent').style.color = "#69D2E7";
                document.getElementById('no').innerHTML = pieValueNo + phraseNo;
                document.getElementById('no').style.color = "#F38630";
            }