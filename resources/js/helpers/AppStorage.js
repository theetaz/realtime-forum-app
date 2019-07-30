class AppStorage{

    //store tiken data to local storage
    storeToken(token){
        localStorage.setItem('token', token);
    }

    //store user data to lcoal storage
    storeUser(user){
        localStorage.setItem('user', user);
    }

    //store token and user data to the local storage
    store(token, user){
        this.storeToken(token);
        this.storeUser(user);
    }

    //clear local storage user and token data
    clear(){
        if (localStorage.getItem('user') !== null) {
            localStorage.removeItem('user')
        }
        if(localStorage.getItem('token') !== null){
            localStorage.removeItem('token')
        }
    }

    //get the token form local storage
    getToken(){
        return localStorage.getItem('token') || null;
    }

    //get the user from local storage
    getUser(){
        return localStorage.getItem('user') || null;
    }

}

export default AppStorage = new AppStorage();