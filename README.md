Connector for PHP
========================

Include FalTrakcer.php 

Create a new instance of FT which accepts token of your project from [failtracker.com](http://failtracker.com).

    <script type="text/javascript">
        $ft = new FT("[project token]");
        $ft.send('Title', 'Detailed message about failure');
    </script>
