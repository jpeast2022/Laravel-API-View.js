import axios from "axios";
const setAuthHeader = (token) =>{
    if(token){
        axios.defaults.headers = {
            Authorization: `Bearer ${token}`,
            // 'Accept': 'application/vnd.api+json',
            // 'Content-Type': 'application/vnd.api+json'
        }
    }else{
        delete axios.defaults.headers.Authorization;
    }
}

export default setAuthHeader;