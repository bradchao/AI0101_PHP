\d #
create function fxy(x int, y int)
returns int
begin
    return x + y;
end #
\d ;
--------------------------------------------
-- this code is my first function
\d #
create function ftest1()
returns int
begin
    declare v1 int;
    declare v2 int default 0;
    declare v3 , v4, v5 int default 1;

    set v1 = 10, v3 = 3;

    return v1 + v2 + v4;

end #
\d ;
-------------------------------
\d #
create function ftest2(score int)
returns varchar(10)
begin
    declare ret varchar(10) default 'Down';
    if score >= 60 then
        set ret = 'Pass';
    end if;
    return ret;
end #
\d ;
-------------------------------
\d #
create function ftest3(score int)
returns varchar(10)
begin
    declare ret varchar(10);
    if score >= 90 then
        set ret = 'A';
    elseif score >= 80 then
        set ret = 'B';
    elseif score >= 70 then
        set ret = 'C';
    elseif score >= 60 then
        set ret = 'D';
    else
        set ret = 'E';
    end if;
    return ret;
end #
\d ;

-------------------------------
\d #
create function avgLevel(ch int, eng int, math int)
returns varchar(10)
begin
    declare ret varchar(10);
    declare score int default 0;
    set score = (ch + eng + math) / 3;
    if score >= 90 then
        set ret = 'A';
    elseif score >= 80 then
        set ret = 'B';
    elseif score >= 70 then
        set ret = 'C';
    elseif score >= 60 then
        set ret = 'D';
    else
        set ret = 'E';
    end if;
    return ret;
end #
\d ;
-------------------------------
\d #
create function avgLvl(ch int, eng int, math int)
returns varchar(10)
begin
    declare ret varchar(10);
    declare score int default 0;
    set score = (ch + eng + math) / 3;

    case
        when score >= 90 then
            set ret = 'A';
        when score >= 80 then
            set ret = 'B';
        when score >= 70 then
            set ret = 'C';
        when score >= 60 then
            set ret = 'D';
        else
            set ret = 'E';
    end case;

    return ret;
end #
\d ;
---------------------------------------
\d #
create function ftest4(n int) returns int
begin
    declare i int default 1;
    declare sum int default 0;
    while i <= n do
        set sum = sum + i;
        set i = i + 1;
    end while;

    return sum;
end #
\d ;

---------------------------------------
\d #
create function ftest5(n int) returns int
begin
    declare i int default 1;
    declare sum int default 0;
    repeat
        set sum = sum + i;
        set i = i + 1;
    until i > n
    end repeat;
    return sum;
end #
\d ;
---------------------------------------
---    mywhile: while boolean do

---        leave mywhile;
---    end while;

---    myrepeat: repeat

---        leave myrepeat;
---    until boolean
---    end repeat;

\d #
create function ftest7(n int) returns int
begin
    declare i int default 1;
    declare sum int default 0;
    myloop: loop
        set sum = sum + i;
        set i = i + 1;
        if i > n then
            leave myloop;
        end if;
    end loop myloop;

    return sum;
end #
\d ;
----------------------------------
\d #
create function ftest10(n int) returns int
begin
    declare i int default 0;
    declare sum int default 0;
    myloop: loop
        set i = i + 1;
        if i % 2 = 0 then
            iterate myloop;
        end if;
        set sum = sum + i;
        if i >= n then
            leave myloop;
        end if;
    end loop myloop;

    return sum;
end #
\d ;
----------------------------------
\d #
create function ftest9(n int) returns int
begin
    declare i int default 0;
    declare sum int default 0;
    myloop: while i <= n do
        set i = i + 1;
        if i % 2 = 0 then
            iterate myloop;
        end if;
        set sum = sum + 1;
    end while myloop;

    return sum;
end #
\d ;
