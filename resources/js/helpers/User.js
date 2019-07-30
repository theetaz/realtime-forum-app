import axios from "axios";

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
                    resolve(response);
                })
                .catch(error => {
                    reject(error);
                });
        })

    }
}

export default User = new User();