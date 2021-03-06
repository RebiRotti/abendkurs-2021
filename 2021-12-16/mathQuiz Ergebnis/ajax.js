
function deleteEntry(id) {
    $.ajax({
        url: './delete.php',
        data: {
            id: id
        },
        method: 'POST',
        success: function(data) {
            $('#insert').html(data);
        },
        error: function(data) {
            console.log(data);
        }
    });
}

function save() {
    $.ajax({
        url: './save.php',
        data: {
            username: localStorage.getItem('user'),
            userResult: userResult,
            sum: sum,
            level: level,
            question: question
        },
        method: 'POST',
        success: function(data) {
            $('#insert').html(data);
        },
        error: function(data) {
            console.log(data);
        }
    });
}

function restartGame(id) {
    $.ajax({
        url: './restart.php',
        data: {
            id: id
        },
        method: 'POST',
        success: function(data) {
            //console.log(data);
            let obj = JSON.parse(data);
            //console.log(obj);
            localStorage.clear();
            localStorage.setItem('user', obj.user);
            localStorage.setItem('level', obj.level);
            if(obj.flag == 0) {
                localStorage.setItem('question', obj.question);
                localStorage.setItem('right_answer', obj.right_answer);
            }
            location.reload();
        },
        error: function(data) {
            console.log(data);
        }
    });
}
