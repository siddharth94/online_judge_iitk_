<div id = "grid"><!-- 
<div class="ui grid">
  <div class="one wide column"></div>


      
    <div class="thirteen wide column"> -->
       
    <!-- <div class="ui segment"> -->
<div class = "ui raised segment">
              <div class = "ui top attached label red"><b>Leaderboard</b></div>
          
<table class="ui inverted table segment">
        <thead>
          <tr>
            <th>Rank</th>
            <th>Username</th>
            <th>Score</th>
        </tr></thead>
        <tbody>
        <?php
          $i=1;
           foreach ($ranks as $nr) {
          $name = $nr->usrnm ;
          $point = $nr->score ;
          //$nr->rank =$i;
        echo("<TR><TD>");
           echo $i;
            echo "   ";
            echo("<TD>");
           echo $name ;
           
          echo "      ";

          echo("<TD>");
          echo $point;

          echo "<br>";
        $i++;
        }
          ?>
        </tbody>
</table>
  <br>
<br><br><br>

</div>
</div>