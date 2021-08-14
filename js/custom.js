function messageManagement(status, message) {
    if (status)
    {
        alertify.success(message);
    } else {
        alertify.error(message);
    }
}