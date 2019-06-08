/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package garnachas;

import java.sql.*;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.scene.control.TableColumn;

/**
 *
 * @author yugi-
 */
public class Conectar {

    private Connection cnx;
    private Statement s;
    private ResultSet rs;

    Conectar() {
        try {
            Class.forName("com.mysql.jdbc.Driver");
            cnx = DriverManager.getConnection("jdbc:mysql://localhost/tartedelavie", "root", "n0m3l0");
        } catch (SQLException | ClassNotFoundException ex) {
            System.out.println(ex);
        }
    }

    public void cerrar() throws SQLException {
        cnx.close();
    }

    public boolean login(String usr, String psw) throws SQLException {
        s = cnx.createStatement();
        String query = " CALL LOGIN_P(\"" + usr + "\",\"" + psw + "\")";
        rs = s.executeQuery(query);
        int x = -1;
        String y = "ss";
        try {
            while (rs.next()) {
                x = rs.getInt(1);
                y = rs.getString(2);
            }
        } catch (SQLException e) {

        }
        return x == 1;
    }

    public ObservableList<Producto> tablaProductos() throws SQLException {
        ObservableList<Producto> productos = FXCollections.observableArrayList();
        s = cnx.createStatement();
        //String id, String nombre, String usuario, String precio, String estado, String cantidad, String entrega
        String query = "call REVISAR_PEDIDOSG()";
        rs = s.executeQuery(query);
        while (rs.next()) {
            productos.add(new Producto(String.valueOf(rs.getInt(1)), rs.getString(2), rs.getString(8), String.valueOf(rs.getInt(3)), rs.getString(4), String.valueOf(rs.getInt(5)), String.valueOf(rs.getDate(6))));
        }
        return productos;
    }

    public void acepta(int id) {
        try {
            s = cnx.createStatement();
            String query = "call ACEPTAR(" + id + ")";
            s.executeUpdate(query);
        } catch (SQLException e) {

        }
    }

    public void rechaza(int id) {
        try {
            s = cnx.createStatement();
            String query = "call RECHAZAR(" + id + ")";
            s.executeUpdate(query);
        } catch (SQLException e) {

        }
    }

    public String AltaP(String nombre, String desc, float precio, String imagen) {
        String x="";
        try {
            s = cnx.createStatement();
            String query = "call ALTA_PRODUCTO(\"" + nombre + "\",\"" + desc + "\"," + precio + ",\"" + imagen + "\")";
           rs=  s.executeQuery(query);
           while(rs.next()){
               x = rs.getString(1);
           }
        } catch (SQLException e) {

        }
        return x;
    }

    public ObservableList<String> selectProductos() {
        ObservableList<String> productos = FXCollections.observableArrayList();
        try {
            s = cnx.createStatement();
            String query = "select Nombre from producto";
            rs = s.executeQuery(query);
            while (rs.next()) {
                productos.add(rs.getString(1));
            }

        } catch (SQLException e) {

        }
        return productos;
    }

    public String AltaIngrediente(String nombre, String descripcion, int cantidad) {
        String x="";
        try {
            s = cnx.createStatement();
            String query = "CALL ALTA_INGREDIENTE(\"" + nombre + "\",\"" + descripcion + "\"," + cantidad + ")";
            rs=  s.executeQuery(query);
           while(rs.next()){
               x = rs.getString(1);
           }
        } catch (SQLException e) {

        }
        return x;
    }

    public ObservableList<String> selectIngredientes() {
        ObservableList<String> productos = FXCollections.observableArrayList();
        try {
            s = cnx.createStatement();
            String query = "select producto from inventario";
            rs = s.executeQuery(query);
            while (rs.next()) {
                productos.add(rs.getString(1));
            }

        } catch (SQLException e) {

        }
        return productos;
    }

    public String altaReceta(String producto, String ingrediente, int cantidad) {
        String x = "";
        try {
            s = cnx.createStatement();
            String query = "call AGREGAR_RECETA(\"" + ingrediente + "\",\"" + producto + "\"," + cantidad + ")";
            rs = s.executeQuery(query);
            while (rs.next()) {
                x = rs.getString("MENSAJE");
            }

        } catch (SQLException e) {

        }
        return x;
    }

    public ObservableList<Recetas> tablaRecetas() {
        ObservableList<Recetas> recetas = FXCollections.observableArrayList();
        try {
            s = cnx.createStatement();
            String query = "CALL REVISAR_INVENTARIO();";
            rs = s.executeQuery(query);
            while (rs.next()) {
                //public Recetas(String id, String requerido, String producto, String disponible, String nombre) {
                recetas.add(new Recetas(String.valueOf(rs.getInt(1)), String.valueOf(rs.getInt(2)), rs.getString(3), String.valueOf(rs.getInt(4)), rs.getString(5)));
            }

        } catch (SQLException e) {

        }
        return recetas;
    }

    public ObservableList<Recetas> tablaFiltro(String filtrar) {
        ObservableList<Recetas> recetas = FXCollections.observableArrayList();
        try {
            s = cnx.createStatement();
            String query = "CALL REVISAR_INVENTARIO_FILTRO(\"" + filtrar + "\");";
            rs = s.executeQuery(query);
            while (rs.next()) {
                //public Recetas(String id, String requerido, String producto, String disponible, String nombre) {
                recetas.add(new Recetas(String.valueOf(rs.getInt(1)), String.valueOf(rs.getInt(2)), rs.getString(3), String.valueOf(rs.getInt(4)), rs.getString(5)));
            }

        } catch (SQLException e) {

        }
        return recetas;

    }

    public void eliminar(int id) {
        try {
            s = cnx.createStatement();
            String query = " CALL ELIMINAR_INGREDIENTE(" + id + ")";
            s.executeUpdate(query);

        } catch (SQLException e) {

        }
    }
    public String surtir(String nombre, int cantidad){
        String x ="";
        try {
            s = cnx.createStatement();
            String query = " CALL SURTIR(\""+nombre+"\","+cantidad+");";
            rs = s.executeQuery(query);
            while(rs.next()){
                x = rs.getString(1);
            }

        } catch (SQLException e) {

        }
        return x;
    }
    public String Alta_Pastelero(String nombre,String apellidos,boolean sexo, String usr,String psw, String dir,String tarjeta,int cvv,
    String banco){
        String mensaje ="";
        //ALTA_PASTELERO(FNAME VARCHAR(50),LNAME VARCHAR(50),SEX BOOL,
        //USERS TEXT,PASS TEXT,DIR TEXT,NUMEROS TEXT,CVVV INT,BANCOS TEXT)
         try {
            s = cnx.createStatement();
            String query = " CALL ALTA_PASTELERO(\""+nombre+"\",\""+apellidos+"\","+sexo+",\""+usr+"\",\""+psw+"\",\""+dir+"\",\""+tarjeta+"\""
                    + ","+cvv+",\""+banco+"\");";
            rs = s.executeQuery(query);
            while(rs.next()){
                mensaje = rs.getString(1);
            }

        } catch (SQLException e) {
            mensaje = String.valueOf(e);
        }
        return mensaje;
    }

}
