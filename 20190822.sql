\d #
create procedure ptest1()
begin
    select * from bk1;
end #
\d ;
---------------------
-- in, out, inout
\d #
create procedure ptest2(in x int)
begin
    select x;
end #
\d ;
---------------------
-- in, out, inout
\d #
create procedure ptest3(out x int)
begin
    select x;
end #
\d ;
---------------------
-- in, out, inout
\d #
create procedure ptest4(out x int)
begin
    select count(*) into x from bk1;
end #
\d ;

---------------------
-- in, out, inout
\d #
create procedure ptest5(inout x int)
begin
    select x;
end #
\d ;
-- in, out, inout
\d #
create procedure ptest6(inout x int)
begin
    select x;
    select max(ch) into x from bk1;
end #
\d ;
-- in, out, inout
\d #
create procedure ptest72(in kw varchar(100), out count int)
begin
    select count(*) into count from bk1 where cphone like kw;
end #
\d ;
--------------------------
\d #
create procedure ptest73(in kw varchar(100), out count int)
begin
    select count(*) into count from bk1 
        where cphone like kw COLLATE utf8_unicode_ci;
end #
\d ;
------------------------
\d #
create procedure ptest74(in kw varchar(100), out count int)
begin
    set @key = concat(kw, '%') COLLATE utf8_unicode_ci;
    select count(*) into count from bk1 
        where cphone like @key;
end #
\d ;
------
\d #
create procedure ptest75(in kw varchar(100))
begin
    set @key = concat('%', kw, '%') COLLATE utf8_unicode_ci;
    set @query = 'select cid,cname,cphone from bk1 where cname like ?';

    prepare stmt from @query;
    execute stmt using @key;
end #
\d ;

------
-- create trigger tname timing event on tbname for each row xxx;
\d #
create trigger tname timing event on tbname for each row
begin
end #
\d ;
