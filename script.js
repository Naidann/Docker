function login() {
    let log = $('#login').val()
    let pas = $('#passw').val()

    $.get('auth.php', {login: log, password: pas}, function(data) {
        let otvet = JSON.parse.apply(data)
        if ('error' in otvet) {
            alert(otvet['error']['text'])
        }
        else if ('user' in otvet) {
            localStorage['token'] = otvet['user']['token']
            localStorage['expired'] = otvet['user']['expired']
        }
        else {
            alert('непредвиденная ошибка')
            console.log(data)
        }
    })
}