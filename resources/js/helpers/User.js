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
                console.log(response.data);
            })
            .catch(error => {
                console.log("hello");
            });
    }
}

export default User = new User();