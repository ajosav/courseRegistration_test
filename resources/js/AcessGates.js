export default class Gate {
    constructor(user) {
        this.user = user;
    }
    isAdmin() {
        return this.user.category.name === "admin";
    }
    isStudent() {
        return this.user.category.name === "admin";
    }
}