<footer class="footer">
    <div class="footer-copy">
        <div class="container">
            <p>© <?php
                $startYear = 2020;
                $thisYear = date('Y');
                if ($startYear == $thisYear) {
                    echo $thisYear;
                } else {
                    echo "{$startYear}&ndash;{$thisYear}";
                }
                echo ' '.$title?> Все права защищены</p>
        </div>
    </div>
</footer>
<script type="text/javascript" src="js/jquery-3.5.1.js"></script>
<script type="text/javascript" src="js/main.js"></script>
</body>
</html>
