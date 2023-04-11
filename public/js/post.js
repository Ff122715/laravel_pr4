async function postJson(route, data, method, _token) {
    let response = await fetch(route, {
        method,
        headers: {
            'Content-type': 'application/json;charset=utf-8'
        },
        body: JSON.stringify({
            data,
            _token
        })
    })
    return await response.json()
}

async function getData(route, param = '') {
    if (param != '') {
        route += '?' + param
    }
    let response = await fetch(route)
    return await response.json()
}
