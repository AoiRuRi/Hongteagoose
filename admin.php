<!DOCTYPE html>
<html>
<head>
  <title>管理者介面</title>
  <link rel="stylesheet" href="css/admin.css?version=<?php echo time(); ?>" >
</head>
<body>
  <h1>鋐茶鵝管理者介面</h1>
  <h2>庫存管理</h2>
  <table id="instock-table">
    <tr>
      <th>商品名稱</th>
      <th>價格</th>
      <th>庫存數量</th>
      <th><span class="button add-button">增加</span></th>
    </tr>
    <tr>
      <td>商品 A</td>
      <td>$100</td>
      <td>10</td>
      <td>
        <span class="button edit-button">編輯</span>
        <span class="button delete-button">刪除</span>
      </td>
    </tr>
    <tr>
      <td>商品 B</td>
      <td>$200</td>
      <td>5</td>
      <td>
        <span class="button edit-button">編輯</span>
        <span class="button delete-button">刪除</span>
      </td>
    </tr>
    <tr>
      <td>商品 C</td>
      <td>$100</td>
      <td>10</td>
      <td>
        <span class="button edit-button">編輯</span>
        <span class="button delete-button">刪除</span>
      </td>
    </tr>
  </table>
  <h2>商品管理</h2>
  <table id="commodity-table">
    <tr>
      <th>商品名稱</th>
      <th>售價</th>
      <th>商品圖片</th>
      <th><span class="button add-button">增加</span></th> 
    </tr>
    <tr>
      <td>商品 A</td>
      <td>$200</td>
      <td><img class="commoditypic" src="image/230505_5.jpg" alt="pic"></td>
      <td>
        <span class="button edit-image-button">更換圖片</span>
        <span class="button edit-button">編輯</span>
        <span class="button delete-button">刪除</span>
      </td>
    </tr>
</table>
  <h2>訂單管理</h2>
  <table id="order-table">
    <tr>
      <th>訂單編號</th>
      <th>訂購人姓名</th>
      <th>商品名稱</th>
      <th>商品數量</th>
      <th>金額</th>
      <th>地址</th>
      <th>狀態</th>
      <th><span class="button add-button">增加</span></th>
    </tr>
    <tr>
      <td>001</td>
      <td>MR.LEE</td>
      <td>商品A</td>
      <td>2</td>
      <td>$150</td>
      <td>新北市板橋區XX路XX號</td>
      <td>已出貨</td>
      <td>
        <span class="button edit-button">編輯</span>
        <span class="button delete-button">刪除</span>
      </td>
    </tr>
    <tr>
      <td>002</td>
      <td>MS.LIN</td>
      <td>商品B</td>
      <td>4</td>
      <td>$300</td>
      <td>新北市中和區XX路XX號</td>
      <td>處理中</td>
      <td>
        <span class="button edit-button">編輯</span>
        <span class="button delete-button">刪除</span>
      </td>
    </tr>
  </table>
  <h2>會員管理</h2>
  <table>
    <tr>
      <th>會員編號</th>
      <th>會員姓名</th>
      <th>使用者名稱</th>
      <th>手機號碼</th>
      <th>電子信箱</th>
      <th>地址</th>
      <th></th>
    </tr>
    <tr>
      <td>001</td>
      <td>MR.LEE</td>
      <td>AEDS</td>
      <td>0922134342</td>
      <td>AEDS@gmail.com</td>
      <td>新北市板橋區XX路XX號</td>
      <td>
        <span class="button edit-button">編輯</span>
        <span class="button delete-button">刪除</span>
      </td>
    </tr>
    <tr>
      <td>002</td>
      <td>MS.LIN</td>
      <td>fhjd</td>
      <td>0988321345</td>
      <td>fhjd@gmail.com</td>
      <td>新北市中和區XX路XX號</td>
      <td>
        <span class="button edit-button">編輯</span>
        <span class="button delete-button">刪除</span>
      </td>
    </tr>
  </table>
  
</body>
<script>
// 編輯按鈕點擊事件處理
var editButtons = document.getElementsByClassName('edit-button');
for (var i = 0; i < editButtons.length; i++) {
  editButtons[i].addEventListener('click', handleEdit);
}

// 編輯處理函數
function handleEdit() {
  var row = this.parentNode.parentNode;
  var tdElements = row.getElementsByTagName('td');

  // 創建對應數量的 <input> 元素並替換 <td> 元素
  for (var j = 0; j < tdElements.length - 1; j++) {
    var td = tdElements[j];
    
    // 檢查 <td> 內是否存在 <img> 元素
    if (td.querySelector('img')) {
      continue; // 如果存在 <img> 元素，跳過轉換為輸入框的步驟
    }
    
    var input = document.createElement('input');
    input.value = td.textContent;

    td.textContent = '';
    td.appendChild(input);
  }

  var saveButton = document.createElement('span');
  saveButton.classList.add('button');
  saveButton.innerText = '保存';
  this.parentNode.replaceChild(saveButton, this);
  saveButton.addEventListener('click', handleSave);
}

// 保存處理函數
function handleSave() {
  var row = this.parentNode.parentNode;
  var tdElements = row.getElementsByTagName('td');

  // 將 <input> 元素的值更新到相應的 <td> 元素
  for (var j = 0; j < tdElements.length - 1; j++) {
    var td = tdElements[j];
    
    // 檢查 <td> 內是否存在 <img> 元素
    if (td.querySelector('img')) {
      continue; // 如果存在 <img> 元素，跳過更新值的步驟
    }
    
    var input = td.querySelector('input');
    td.textContent = input.value;
  }

  var editButton = document.createElement('span');
  editButton.classList.add('button', 'edit-button');
  editButton.innerText = '編輯';
  this.parentNode.replaceChild(editButton, this);
  editButton.addEventListener('click', handleEdit);
}
</script>

  <script>
    // 刪除按鈕點擊事件處理
    var deleteButtons = document.getElementsByClassName('delete-button');
    for (var i = 0; i < deleteButtons.length; i++) {
      deleteButtons[i].addEventListener('click', handleDelete);
    }
     // 刪除處理函數
     function handleDelete() {
      var row = this.parentNode.parentNode;
      row.parentNode.removeChild(row);
    }
  </script>
  <script>
 // 更換圖片按鈕點擊事件處理
var editImageButtons = document.getElementsByClassName('edit-image-button');
for (var i = 0; i < editImageButtons.length; i++) {
  editImageButtons[i].addEventListener('click', handleEditImage);
}

// 更換圖片處理函數
function handleEditImage() {
  var button = this; // 儲存按鈕元素的參考

  // 創建<input>元素作為檔案選擇器
  var inputFile = document.createElement('input');
  inputFile.type = 'file';
  inputFile.accept = 'image/*';

  // 設置事件監聽器
  inputFile.addEventListener('change', function(event) {
    var td = button.parentNode.parentNode; // 使用儲存的按鈕元素參考
    var img = td.querySelector('img');

    // 確認使用者已選擇檔案
    if (event.target.files && event.target.files[0]) {
      var reader = new FileReader();

      // 載入圖片後更新圖片元素
      reader.onload = function(e) {
        img.src = e.target.result;
      };

      // 讀取檔案內容並顯示圖片
      reader.readAsDataURL(event.target.files[0]);
    }
  });

  // 觸發檔案選擇
  inputFile.click();
}

</script>
<script>
// 增加按鈕點擊事件處理(庫存管理)
var addButton = document.querySelector('#instock-table .add-button');
addButton.addEventListener('click', handleAdd);

// 增加處理函數
function handleAdd() {
  var table = document.getElementById('instock-table');

  // 創建新的 <tr> 元素
  var newRow = document.createElement('tr');
  
  // 在新行中創建 <td> 元素並填充內容
  var td1 = document.createElement('td');
  td1.textContent = '新商品名稱';
  var td2 = document.createElement('td');
  td2.textContent = '新價格';
  var td3 = document.createElement('td');
  td3.textContent = '新庫存數量';
  var td4 = document.createElement('td');
  
  // 在新行的最後一個 <td> 元素中插入按鈕
  var editButton = document.createElement('span');
  editButton.classList.add('button', 'edit-button');
  editButton.innerText = '編輯';
  td4.appendChild(editButton);
  
  var deleteButton = document.createElement('span');
  deleteButton.classList.add('button', 'delete-button');
  deleteButton.innerText = '刪除';
  td4.appendChild(deleteButton);
  
  // 在新行中添加 <td> 元素
  newRow.appendChild(td1);
  newRow.appendChild(td2);
  newRow.appendChild(td3);
  newRow.appendChild(td4);
  
  // 將新行插入表格的最後一行之前
  table.appendChild(newRow);
  
  // 重新綁定按鈕的事件處理函數
  editButton.addEventListener('click', handleEdit);
  deleteButton.addEventListener('click', handleDelete);
  addButton.addEventListener('click', handleAdd);
}
</script>
<script>

  // 增加按鈕點擊事件處理(商品管理)
  var addButton = document.querySelector('#commodity-table .add-button');
  addButton.addEventListener('click', handleAdd);

  // 增加處理函數
function handleAdd() {
  var table = document.getElementById('commodity-table');

  // 創建新的 <tr> 元素
  var newRow = document.createElement('tr');

  // 在新行中創建 <td> 元素並填充內容
  var td1 = document.createElement('td');
  td1.textContent = '新商品名稱';
  var td2 = document.createElement('td');
  td2.textContent = '新售價';
  var td3 = document.createElement('td');
  var td4 = document.createElement('td');

  // 創建圖片元素
  var img = document.createElement('img');
  img.classList.add('commoditypic');
  img.src = 'image/230505_5.jpg'; // 設定圖片路徑

  // 將圖片元素插入到 <td> 中
  td3.appendChild(img);

  // 在新行的最後一個 <td> 元素中插入按鈕
  var editImageButton = document.createElement('span');
  editImageButton.classList.add('button', 'edit-image-button');
  editImageButton.innerText = '更換圖片';
  td4.appendChild(editImageButton);

  var editButton = document.createElement('span');
  editButton.classList.add('button', 'edit-button');
  editButton.innerText = '編輯';
  td4.appendChild(editButton);

  var deleteButton = document.createElement('span');
  deleteButton.classList.add('button', 'delete-button');
  deleteButton.innerText = '刪除';
  td4.appendChild(deleteButton);

  // 在新行中添加 <td> 元素
  newRow.appendChild(td1);
  newRow.appendChild(td2);
  newRow.appendChild(td3);
  newRow.appendChild(td4);

  // 將新行插入表格的最後一行之前
  table.appendChild(newRow);

  // 重新綁定按鈕的事件處理函數
  editImageButton.addEventListener('click', handleEditImage);
  editButton.addEventListener('click', handleEdit);
  deleteButton.addEventListener('click', handleDelete);

  // 移除舊的按鈕事件處理
  addButton.removeEventListener('click', handleAdd);
  // 重新綁定增加按鈕的事件處理函數
  addButton.addEventListener('click', handleAdd);
}

</script>
</script>

<script>
// 增加按鈕點擊事件處理(訂單管理)
var addButton = document.querySelector('#order-table .add-button');
addButton.addEventListener('click', handleAdd);

// 增加處理函數
function handleAdd() {
  var table = document.getElementById('order-table');

  // 創建新的 <tr> 元素
  var newRow = document.createElement('tr');
  
  // 在新行中創建 <td> 元素並填充內容
  var td1 = document.createElement('td');
  td1.textContent = '新訂單編號';
  var td2 = document.createElement('td');
  td2.textContent = '新訂購人姓名';
  var td3 = document.createElement('td');
  td3.textContent = '新商品名稱';
  var td4 = document.createElement('td');
  td4.textContent = '新商品數量';
  var td5 = document.createElement('td');
  td5.textContent = '新金額';
  var td6 = document.createElement('td');
  td6.textContent = '新地址';
  var td7 = document.createElement('td');
  td7.textContent = '新狀態';
  var td8 = document.createElement('td');
  
  // 在新行的最後一個 <td> 元素中插入按鈕
  var editButton = document.createElement('span');
  editButton.classList.add('button', 'edit-button');
  editButton.innerText = '編輯';
  td8.appendChild(editButton);
  
  var deleteButton = document.createElement('span');
  deleteButton.classList.add('button', 'delete-button');
  deleteButton.innerText = '刪除';
  td8.appendChild(deleteButton);
  
  // 在新行中添加 <td> 元素
  newRow.appendChild(td1);
  newRow.appendChild(td2);
  newRow.appendChild(td3);
  newRow.appendChild(td4);
  newRow.appendChild(td5);
  newRow.appendChild(td6);
  newRow.appendChild(td7);
  newRow.appendChild(td8);
  
  // 將新行插入表格的最後一行之前
  table.appendChild(newRow);
  
  // 重新綁定按鈕的事件處理函數
  editButton.addEventListener('click', handleEdit);
  deleteButton.addEventListener('click', handleDelete);
  addButton.addEventListener('click', handleAdd);
}
</script>

</html>
