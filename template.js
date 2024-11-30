function loadNavbar() {
    const navbarTemplate = `
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="index.html">Hackowanie</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav nav-item1">
                <li class="nav-item">
                    <a class="nav-link" href="page1.html">Hardware</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="page2.html">Podstrona 2</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="page3.html">Podstrona 3</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="page4.html">Podstrona 4</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="page5.html">Podstrona 5</a>
                </li>
            </ul>
            <ul class="navbar-nav nav-item2 ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="rejestracja.html">Rejestracja</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logowanie.html">Logowanie</a>
                </li>
            </ul>
        </div>
    </nav>
    `;
    
    document.getElementById('navigation').innerHTML = navbarTemplate;
}
