function navigateTo(page) {
    history.pushState({}, null, page);

    window.history.replaceState({}, null, page);
}