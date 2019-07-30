import axios from "axios";
import Token from "./Token";

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
                    const token = response.data.access_token;
                    if(Token.isValid(token)){
                        resolve(response);  
                    }
                })
                .catch(error => {
                    reject(error);
                });
        })

    }
}

export default User = new User();