-- 建立資料庫iii
drop database if exists `iii`;
create database `iii` default character set utf8 collate utf8_unicode_ci;

-- 選擇資料庫
use iii;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

-- 建立客戶資料表(customers)
drop table if exists `customers`;
create table `customers` (
    customerId int(3) zerofill auto_increment,
    customerName varchar(20),
    customerPhone varchar(10),
    customerEmail varchar(100),
    customerAddress varchar(100),
    primary key (customerId)
) character set utf8 collate utf8_unicode_ci;

-- 建立供應商(suppliers)
drop table if exists `suppliers`;
create table `suppliers` (
    supplierId int auto_increment,
    supplierName varchar(50),
    supplierPhone varchar(10) not null,
    supplierAddress varchar(100),
    primary key (supplierId),
    unique key (supplierPhone)
) character set utf8 collate utf8_unicode_ci;

-- 建立商品列表(products)
drop table if exists `products`;
create table `products` (
    productid int auto_increment,
    productNumber varchar(10) not null,
    productName varchar(50),
    productPrice int,
    supplierPhone varchar(10) not null,
    primary key (productid),
    foreign key (supplierPhone) references suppliers(supplierPhone) on update cascade,
    unique key (productNumber)
) character set utf8 collate utf8_unicode_ci;

-- 建立訂單明細(orderDetails)
drop table if exists `orderDetails`;
create table `orderDetails` (
    orderDetailsId int auto_increment,
    orderNumber varchar(10) not null,
    productNumber varchar(10) not null,
    productPrice int,
    quantity int,
    primary key (orderDetailsId),
    -- foreign key (productNumber) references products(productNumber),
    index (orderNumber)
) character set utf8 collate utf8_unicode_ci;

-- 建立訂單(orders)
drop table if exists `orders`;
create table `orders` (
    orderId int auto_increment,
    orderNumber varchar(10) not null,
    customerId int(3) zerofill,
    primary key (orderId),
    -- foreign key (orderNumber) references orderDetails(orderNumber),
    foreign key (customerId) references customers(customerId)
) character set utf8 collate utf8_unicode_ci;


--------------------------------- 客戶 ---------------------------------

\d #
-- 新增 -- call addCustomer('名字', '電話', '信箱', '地址');
create procedure addCustomer(
    in cname varchar(20), 
    in cphone varchar(10), 
    in cemail varchar(100), 
    in caddress varchar(100)
)
begin

    insert into `customers` (`customerName`, `customerPhone`, `customerEmail`, `customerAddress`)
    values (cname, cphone, cemail, caddress);
end #

-- 修改 --
create procedure updateCustomer(
    in cid int,
    in cname varchar(20), 
    in cphone varchar(10), 
    in cemail varchar(100), 
    in caddress varchar(100)
)
begin
    if cname = '' then
        select `customerName` into @v_cname from `customers`
        where `customerId` = cid;
    else set @v_cname = cname; end if;
    if cphone = '' then
        select `customerPhone` into @v_cphone from `customers`
        where `customerId` = cid;
    else set @v_cphone = cphone; end if;
    if cemail = '' then
        select `customerEmail` into @v_cemail from `customers`
        where `customerId` = cid;
    else set @v_cemail = cemail; end if;
    if caddress = '' then
        select `customerAddress` into @v_caddress from `customers`
        where `customerId` = cid;
    else set @v_caddress = caddress; end if;
    update `customers` set
    `customerName` = @v_cname,
    `customerPhone` = @v_cphone,
    `customerEmail` = @v_cemail,
    `customerAddress` = @v_caddress
    where `customerId` = cid;
end #

-- 刪除 -- call deleteCustomer(客戶ID);
create procedure deleteCustomer(in cid int)
begin
    delete from `customers` where `customerid` = cid;
end #

-- 查詢 -- call selectCutsomer('keyword')
create procedure selectCustomer(in kw varchar(50))
begin
    set @v_kw = concat('%', kw, '%');
    select count(*) into @count from `customers`
    where `customerPhone` like @v_kw or `customerName` like @v_kw;
    if kw = '' or @count = 0 then
        select * from `customers`;
    else
        select * from `customers`
        where `customerPhone` like @v_kw or `customerName` like @v_kw;
    end if;
end #

--------------------------------- 供應商 ---------------------------------

-- 新增 -- call addSupplier('名稱', '電話', '地址');
create procedure addSupplier(
    in sname varchar(50),
    in sphone varchar(10),
    in saddress varchar(100) 
)
begin
    insert into `suppliers` (`supplierName`, `supplierPhone`, `supplierAddress`)
    values (sname, sphone, saddress);    
end #

-- 修改 --
create procedure updateSupplier(
    in supid int,
    in sname varchar(50),
    in sphone varchar(10),
    in saddress varchar(100)
)
begin
    if sname = '' then
        select `supplierName` into @v_sname from `suppliers`
        where `supplierId` = supid;
    else set @v_sname = sname; end if;
    if sphone = '' then
        select `supplierPhone` into @v_sphone from `suppliers`
        where `supplierId` = supid;
    else set @v_sphone = sphone ; end if;
    if saddress = '' then
        select `supplierAddress` into @v_saddress from `suppliers`
        where `supplierId` = supid;
    else set @v_saddress = saddress ; end if;
    update `suppliers` set
    `supplierName` = @v_sname,
    `supplierPhone` = @v_sphone,
    `supplierAddress` = @v_saddress
    where `supplierId` = supid;
end #

-- 刪除 -- call deleteSupplier(供應商ID)
create procedure deleteSupplier(in supid int)
begin
    delete from `suppliers` where `supplierid` = supid;
end #

-- 查詢 -- call selectSupplier('keyword');
create procedure selectSupplier(in kw varchar(50))
begin
    set @v_kw = concat('%', kw, '%');
    select count(*) into @count from `suppliers`
    where `supplierPhone` like @v_kw or `supplierName` like @v_kw;
    if kw = '' or @count = 0 then
        select * from `suppliers`;
    else 
        select * from `suppliers`
        where `supplierPhone` like @v_kw or `supplierName` like @v_kw;
    end if;
end #

--------------------------------- 商品 ---------------------------------

-- 新增 -- addProduct('名稱', '編號', '單價');
create procedure addProduct(
    in pname varchar(50),
    in pNum varchar(10),
    in pprice int,
    in sphone varchar(100)
)
begin
    insert into `products` (`productName`, `productNumber`, `productPrice`, `supplierPhone`)
    values (pname, pNum, pprice, sphone);
end #

-- 修改 --
create procedure updateProduct(
    in pNum varchar(10),
    in pname varchar(50),
    in pprice int
)
begin
    if pname = '' then
        select `productName` into @v_pname from `products` where `productNumber` = pNum;
    else set @v_pname = pname; end if;
    if pprice = 0 then
        select `productPrice` into @v_pprice from `products` where `productNumber` = pNum;
    else set @v_pprice = pprice; end if;
    update `products` set 
    `productName` = @v_pname,
    `productPrice` = @v_pprice
    where `productNumber` = pNum;
end #

-- 刪除 --
create trigger deleteProduct before delete on `suppliers` for each row
begin
    delete from `products` where `supplierPhone` = old.supplierPhone;
end #

-- deleteProdcut(商品ID);
create procedure deleteProduct(in pNum varchar(10))
begin
    delete from `products` where `productNumber` = pNum;
end #

-- 查詢 -- call selectProduct('keyword');
create procedure selectProduct(in kw varchar(10))
begin
    set @v_kw = concat('%', kw, '%');
    select count(*) into @count from `products`
    where `productName` like @v_kw or `productNumber` like @v_kw;
    if kw = '' or @count = 0 then
        select * from `products`;
    else 
        select * from `products`
        where `productName` like @v_kw or `productNumber` like @v_kw;
    end if;
end #

-- 已刪除商品表 --
-- create trigger deletedProduct after delete on `products` for each row
-- begin
--     create table if not exists  
-- end #


--------------------------------- 訂單 ---------------------------------

-- 新增 -- call addOrder('訂單編號', '客戶ID', '產品編號', '產品單價', '數量');
create trigger addOrder after insert on `orderdetails` for each row
begin
    select count(*) into @count from `orders` where `orderNumber` = new.orderNumber;
    if @count = 0 then
        insert into `orders` (`orderNumber`, `customerid`)
        values (@v_oNum, @v_cid);
    end if;
end #

-- 刪除 -- deleteOrder(訂單編號);
create procedure deleteOrder(in oNum varchar(10))
begin
    delete from `orders` where `orderNumber` = oNum;
end #

create trigger deleteOrderFromCustomer before delete on `customers` for each row
begin
    delete from `orders` where `customerId` = old.customerId;
end #

--------------------------------- 訂單明細 ---------------------------------

-- 新增 -- call addOrderDetails('訂單編號', '客戶ID', '產品編號', '產品單價', '數量');
create procedure addOrderDetails(
    in oNum varchar(10),
    in cid int,
    in pNum varchar(10),
    in pprice int,
    in quantity int
)
begin
    set @v_oNum = oNum;
    set @v_cid = cid;
    insert into `orderDetails` (`orderNumber`, `productNumber`, `productPrice`, `quantity`)
    values (oNum, pNum, pprice, quantity);
end #

-- 修改 --
create procedure updateOrderDetails(
    in oNum varchar(10),
    in pNum varchar(10),
    in pprice int,
    in qua int
)
begin
    if pprice = 0 then
        select `productPrice` into @v_pprice from `orderDetails` 
        where `orderNumber` = oNum and `productNumber` = pNum;
    else set @v_pprice = pprice; end if;
    if qua = 0 then
        select `quantity` into @v_quantity from `orderDetails` 
        where `orderNumber` = oNum and `productNumber` = pNum;
    else set @v_quantity = qua; end if;
    update `orderDetails` set 
    `productPrice` = @v_pprice, 
    `quantity` = @v_quantity 
    where `orderNumber` = oNum 
    and `productNumber` = pNum;
end #

-- 刪除 --
create procedure deleteOrderDetails(
    in oNum varchar(10),
    in pNum varchar(10)
)
begin
    select oNum, pNum;
    delete from `orderDetails` where `productNumber` = pNum and `orderNumber` = oNum;
    select count(*) into @count from `orderDetails` where `orderNumber` = oNum;
    select @count;
    if @count = 0 then
        delete from `orders` where `orderNumber` = oNum;
    end if;
end #

create trigger deleteOrderDetails before delete on `orders` for each row
begin
    delete from `orderDetails` where `orderNumber` = old.orderNumber;
end #



--------------------------------- 綜合查詢 ---------------------------------

-- 指定客戶查詢訂單，含訂單明細 call selectOrderAll(1, 'P001');
create procedure selectOrderAll(
    in cid int,
    in oNum varchar(10)
)
begin
    if oNum = '' then
        select
            o.`customerId`, od.`orderNumber`, od.`productNumber`,
            od.`productPrice`, od.`quantity`
        from `orderDetails` od 
        join `orders` o on od.`orderNumber` = o.`orderNumber`
        where o.`customerId` = cid;
    else
        select
            od.`orderNumber`, o.`customerId`, od.`productNumber`,
            od.`productPrice`, od.`quantity`
        from `orderDetails` od 
        join `orders` o on od.`orderNumber` = o.`orderNumber`
        where o.`customerId` = cid  and o.`orderNumber` = oNum;
    end if;
end #

-- 指定客戶查詢訂單總金額 call selectOrderTotal(客戶ID, '訂單編號')
create procedure selectOrderTotal(
    in cid int,
    in oNum varchar(10)
)
begin
    select 
        od.`orderNumber`, o.`customerId`, 
        sum(`productPrice` * `quantity`) as total
    from `orderDetails` od
    join `orders` o on od.`orderNumber` = o.`orderNumber`
    where o.`customerId` = cid  and o.`orderNumber` = oNum;
end #

-- 指定商品查詢訂單中的客戶
create procedure selectProForCus(in pNum varchar(10))
begin
    select
        od.`productNumber`, od.`orderNumber`,
        c.`customerName`, od.`quantity`
    from `orderDetails` od 
    join `orders` o on o.`orderNumber` = od.`orderNumber`
    join `customers` c on c.`customerId` = o.`customerId`
    where od.`productNumber` = pNum;
end #

-- 指定供應商查詢訂單中的商品清單
create procedure selectProForSup(
    in supid int,
    in oNum varchar(10)
)
begin
    if oNum = '' then
        select
            s.`supplierName`, od.`orderNumber`, c.`customerName`, 
            od.`productNumber`, p.`productName`, p.`productPrice`,
            od.`quantity`, (od.`quantity` * od.`productPrice`) as totalPrice
        from `orderDetails` od
        join `orders` o on o.`orderNumber` = od.`orderNumber`
        join `products` p on od.`productNumber` = p.`productNumber`
        join `suppliers` s on s.`supplierPhone` = p.`supplierPhone`
        join `customers` c on c.`customerId` = o.`customerId`
        where `supplierId` = supid;
    else 
        select
            s.`supplierName`, od.`orderNumber`, c.`customerName`, 
            od.`productNumber`, p.`productName`, p.`productPrice`,
            od.`quantity`, (od.`quantity` * od.`productPrice`) as totalPrice
        from `orderDetails` od
        join `orders` o on o.`orderNumber` = od.`orderNumber`
        join `products` p on od.`productNumber` = p.`productNumber`
        join `suppliers` s on s.`supplierPhone` = p.`supplierPhone`
        join `customers` c on c.`customerId` = o.`customerId`
        where s.`supplierId` = supid and od.`orderNumber` = oNum;
    end if;
end #

\d ;

call addCustomer('jerry', '0912345678', 'jerry092383@gmail.com', '台中市太平區');
call addCustomer('curry', '0912345672', 'curry@gmail.com', '台中市霧峰區');
call addCustomer('howard', '0912345673', 'howard@gmail.com', '台中市大里區');
call addCustomer('wade', '0912343673', 'wade@gmail.com', '台中市霧峰區');
call addCustomer('kobe', '0912343673', 'kobe@gmail.com', '台中市太平區');

call addSupplier('阿正萬事屋', '0988270468', '台中市太平區');
call addSupplier('阿銀沒事屋', '0922345678', '台中市霧峰區');
call addSupplier('阿璇有事屋', '0932344678', '台中市大里區');

call addProduct('電腦', 'Z001', 15000, '0988270468');
call addProduct('鍵盤', 'Z002', 800, '0988270468');
call addProduct('滑鼠', 'Z003', 500, '0988270468');
call addProduct('網路線', 'Y001', 250, '0922345678');
call addProduct('WIFI分享器', 'Y002', 1000, '0922345678');
call addProduct('switch', 'Y003', 2000, '0922345678');
call addProduct('OPPO充電線', 'S001', 499, '0932344678');
call addProduct('OPPO充電頭', 'S002', 599, '0932344678');
call addProduct('OPPO耳機線', 'S003', 699, '0932344678');

call addOrderDetails('P001', 1, 'Z001', 15000, 2);
call addOrderDetails('P001', 1, 'Y002', 1000, 1);
call addOrderDetails('P002', 2, 'S001', 499, 3);
call addOrderDetails('P002', 2, 'S002', 599, 3);
call addOrderDetails('P003', 3, 'S003', 699, 3);
call addOrderDetails('P004', 1, 'Z001', 15000, 1);
call addOrderDetails('P004', 1, 'Z002', 800, 8);
call addOrderDetails('P004', 1, 'S001', 499, 5);