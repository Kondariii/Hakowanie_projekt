  const navItems = [
      { href: "page1.html", text: "Hardware" },
      { href: "page2.html", text: "Podstrona 2" },
      { href: "page3.html", text: "Podstrona 3" },
      { href: "page4.html", text: "Podstrona 4" },
      { href: "page5.html", text: "Podstrona 5" },
      { href: "rejestracja.html", text: "Rejestracja" },
      { href: "logowanie.html", text: "Logowanie" }
  ];

  function createNavigation(isProjectPage = false) {
      const baseUrl = window.location.pathname.includes('strona-na-inf') ? '/strona-na-inf/' : '/';
      const prefix = isProjectPage ? '../' : '';
    
      const navHtml = `
          <nav class="navbar navbar-expand-lg">
              <a class="navbar-brand" href="${prefix}index.html">Hackowanie</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                  <ul class="navbar-nav">
                      ${navItems.map(item => `
                          <li class="nav-item">
                              <a class="nav-link" href="${prefix}${item.href}">${item.text}</a>
                          </li>
                      `).join('')}
                  </ul>
              </div>
          </nav>
      `;
    
      document.getElementById('navigation').innerHTML = navHtml;
  }