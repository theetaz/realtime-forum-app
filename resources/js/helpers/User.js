import axios from "axios";

class User {

    login(email, password) {
        axios({
            method: "post",
            url: "/api/auth/login",
            data: {
                email: email,
                password: password
            }
        })
            .then(response => {
                console.log(response);
                return response;
            })
            .catch(error => {
                console.log(error.response);
                return error;
            });
    }
}

export default User = new User();