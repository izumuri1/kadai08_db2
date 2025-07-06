<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>どうする中学受験</title>
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    
    <div class='header'>
        <h1 class="">どうする中学受験</h1>
        <h2 class=""><a href="select.php">志望校一覧（受験開始日時順）</a></h2>
        <h2 class=""><a href="select_entrance.php">志望校一覧（入学金締切日時順）</a></h2>
        <h2 class=""><a href="select_interest.php">志望校一覧（志望度順）</a></h2>

        <form method="POST" action="insert.php" class="targetSchool">
        <fieldset>
          <legend></legend>
          <h3>志望校を登録してください</h3><br>
          <h3>1.受験日時</h3>
          <div class="form-row">
            <label for="examStartTime">受験：開始日時</label>
            <input type="datetime-local" name="examStartTime" id="examStartTime" />
          </div>

          <div class="form-row">
            <label for="examEndTime">受験：終了日時</label>
            <input type="datetime-local" name="examEndTime" id="examEndTime" />
          </div>

          <h3>2.学校情報</h3>
          <div class="form-row">
            <label for="schoolName">学校名</label>
            <input type="text" name="schoolName" id="schoolName" />
          </div>

          <div class="form-row">
            <label for="subject">教科</label>
            <select name="subject" id="subject">
              <option value="" selected disabled>選択してください</option>
              <option value="all">4教科</option>
              <option value="sankoku">算数・国語</option>
              <option value="other">その他</option>
            </select>
          </div>

          <div class="form-row">
            <label for="hensa">偏差値</label>
            <input type="number" name="hensa" id="hensa" />
          </div>

          <div class="form-row">
            <label for="station">最寄駅</label>
            <input type="text" name="station" id="station" />
          </div>

          <div class="form-row">
            <label for="walk">最寄駅から徒歩〇分</label>
            <input type="number" name="walk" id="walk" />
          </div>

          <h3>3.子供の気持ち</h3>
          <div class="form-row">
            <label for="interest">志望度：低(1)～高(5)</label>
            <select name="interest" id="interest">
              <option value="" selected disabled>選択してください</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
            </select>
          </div>

          <div class="form-row">
            <label for="favorite">お気に入りポイント</label>
            <input type="text" name="favorite" id="favorite" />
          </div>

          <h3>4.親の頑張り</h3>
          <div class="form-row">
            <label for="application">願書：締切日時</label>
            <input type="datetime-local" name="application" id="application" />
          </div>
          
          <div class="form-row">
            <label for="applicationFee">受験料</label>
            <input type="number" name="applicationFee" id="applicationFee" />
          </div>

          <div class="form-row">
            <label for="entrance">入学金：締切日時</label>
            <input type="datetime-local" name="entrance" id="entrance" />
          </div>

          <div class="form-row">
            <label for="entranceFee">入学金</label>
            <input type="number" name="entranceFee" id="entranceFee" />
          </div>

          <div class="form-row">
            <label for=""></label>
            <button type="submit">志望校登録</button>
          </div>
        </fieldset>
      </form>
    </div>

</body>

</html>