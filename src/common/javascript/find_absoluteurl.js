function find_absoluteurl(backIndex) {
    return window.location.pathname.split("/").slice(0, this.length - backIndex).join("/");
}
