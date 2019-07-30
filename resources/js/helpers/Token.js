class Token {

    payload(token){
        //decode token and get the payload
        const payload = token.split('.')[1] || null;
        console.log(payload);
    }
}

export default Token = new Token();