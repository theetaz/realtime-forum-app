class AppStorage{
    storeToken(token){
        localStorage.setItem('token', token);
    }

    storeUser(user){
        localStorage.setItem('user', user);
    }

    store(token, user){
        this.storeToken(token);
        this.storeUser(user);
    }

    clear(){
        if (localStorage.getItem('user') !== null) {
            localStorage.removeItem('user')
        }
        if(localStorage.getItem('token') !== null){
            localStorage.removeItem('token')
        }
    }

    getToken(){
        return localStorage.getItem('token') || null;
    }

    getUser(){
        return localStorage.getItem('user') || null;
    }
}

export default AppStorage = new AppStorage();