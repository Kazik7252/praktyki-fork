import { writable } from 'svelte/store'

const UserData = writable([ {
    token: 'defaultToken',
    user_id: 'defaultUser_id'
}]);

export default UserData;