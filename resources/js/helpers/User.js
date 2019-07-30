import axios from "axios";
import Token from "./Token";
import AppStorage from "./AppStorage";

class User {

    login(email, password) {

        return new Promise((resolve, reject) => {

            axios({
                method: "post",
                url: "/api/auth/login",
                data: {
                    email: email,
                    password: password
                }
            })
                .then(response => {
                    const token = response.data.access_token || null;
                    const user = response.data.user || null;
                    this.saveUserDataAfterLogin(token, user);
                    resolve(response);

                })
                .catch(error => {
                    reject(error);
                });
        })

    }
    
    //check token is already in local storage 
    hasToken(){
        const savedToken = AppStorage.getToken();
        if(savedToken){
            return Token.isValid(savedToken) ? true : false;
        }

        return false;
    }

    //check user login or not
    isUserLogin(){
        return this.hasToken();
    }

    //user logout function
    logout(){
        AppStorage.clear();
    }

    //get log in user user name
    getName(){
        if(this.isUserLogin()){
            //get the user object form local strage
            const user = JSON.parse(AppStorage.getUser());
            if(user){
                return user.name;
            }
            return null;
        }

        return null;
    }

    //get log in user id
    getUserId(){
        if(this.isUserLogin()){
            //get the user object form local strage
            const user = JSON.parse(AppStorage.getUser());
            if(user){
                return user.id;
            }
            return null;
        }

        return null;
    }

    //save token and user data to local storage
    saveUserDataAfterLogin(token, user) {
        
        //check provided token is valid or not
        if (Token.isValid(token)) {
            //store access token and user details in local storage
            AppStorage.store(token, JSON.stringify(user));
        }
    }
}

export default User = new User();