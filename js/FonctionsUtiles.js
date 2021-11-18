let retireEspaces = (x) => {
    while(x.indexOf(' ') >= 0)x = x.replace(' ', '')
    return x
}

let estNumero = (x) => {
    let tmp = retireEspaces(x)
    if(tmp.length >= 9){
        return !isNaN(tmp)
    }
    return false
}

