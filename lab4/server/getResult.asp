<!DOCTYPE html>
<%
    response.expires=-1
    fname=ucase(request.querystring("fname"))
    lname=ucase(request.querystring("lname"))
    response.write("hello "+fname+" "+lname)
%>
