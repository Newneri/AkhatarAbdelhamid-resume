<header>
    <!--<h2>CyGym</h2>!-->

    <?php
    session_start();
    define('ROOT_PATH', dirname(__DIR__) . '/');
    if (isset($_SESSION['pagename']) && ($_SESSION['pagename'] == 'login-page' || $_SESSION['pagename'] == 'search-page' || $_SESSION['pagename'] == 'inscription-page')) {
        echo "<nav class='navigation-card'>
                <a href='../index.php' class='tab'>
                    <svg
                        class='svgIcon'
                        viewBox='0 0 104 100'
                        fill='none'
                        xmlns='http://www.w3.org/2000/svg'
                    >
                        <path
                        d='M100.5 40.75V96.5H66V68.5V65H62.5H43H39.5V68.5V96.5H3.5V40.75L52 4.375L100.5 40.75Z'
                        stroke='var(--secondary-dark)'
                        stroke-width='7'
                        ></path>
                    </svg>
                </a>
            </nav>";
    } else if (isset($_SESSION['usertype']) && $_SESSION['usertype'] != '') {
        echo "
            <h3>Welcome <span>" . $_SESSION["username"] . "</span></h3>
            <nav class='navigation-card'>
                <a href='../index.php' class='mainBtn'>Log Out</a>
            </nav>";
    } else {
        echo "<nav class='navigation-card'>
                <a href='../connexions/connexion.php' class='mainBtn'>Log In</a>
            </nav>";
    }
    ?>

</header>