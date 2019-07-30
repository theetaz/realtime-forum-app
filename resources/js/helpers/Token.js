

class Token {

    isValid(token){
        const decodedPayload =  this.payload(token);
        if(decodedPayload){
            const permitedUrls = ['http://realtime-forum-app.test/api/auth/login', 'http://realtime-forum-app.test/api/auth/register'];
            if(permitedUrls.includes(decodedPayload.iss)){
                return true;
            }else{
                return false;
            }
        }
    }

    payload(token){
        //decode token and get the payload
        const payload = token.split('.')[1] || null;
        return this.decode(payload);
    }

    decode(payload){
        return JSON.parse(atob(payload));
    }
}

export default Token = new Token();