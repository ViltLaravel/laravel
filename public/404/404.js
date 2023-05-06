window.addEventListener('popstate', function(event) {
    if (isUserLoggedOut()) {
      event.preventDefault();
      window.location.href = route('out-of-bound');
    }
  });
