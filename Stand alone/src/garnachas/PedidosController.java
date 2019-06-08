/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package garnachas;

import java.net.URL;
import java.sql.SQLException;
import java.util.ResourceBundle;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.Node;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.Alert;
import javafx.scene.control.Button;
import javafx.scene.control.TableColumn;
import javafx.scene.control.TableView;
import javafx.scene.control.TextField;
import javafx.scene.control.cell.PropertyValueFactory;
import javafx.stage.Stage;

/**
 * FXML Controller class
 *
 * @author xavil
 */
public class PedidosController implements Initializable {
    @FXML
    private TextField texto;
    @FXML
    private Button MenuPrin;
    @FXML
    private Button aceptar;
    @FXML
    private Button rechazar;
    @FXML
    private TableView<Producto> pedidos;
    @FXML
    private TableColumn<Producto, String> id;
    @FXML
    private TableColumn<Producto, String> usuario;
    @FXML
    private TableColumn<Producto, String> producto;
    @FXML
    private TableColumn<Producto, String> precio;
    @FXML
    private TableColumn<Producto, String> estado;
    @FXML
    private TableColumn<Producto, String> cantidad;
    @FXML
    private TableColumn<Producto, String> entrega;

    /**
     * Initializes the controller class.
     */
    @FXML
    private void IrMenu(ActionEvent event) throws Exception {
        Parent root = FXMLLoader.load(getClass().getResource("MenuPrincipal.fxml"));
        Scene scene = new Scene(root);
        Stage appStage = (Stage) ((Node) event.getSource()).getScene().getWindow();
        appStage.setScene(scene);
        appStage.toFront();
        appStage.show();

    }
     @FXML
     private void aceptar(ActionEvent event){
             if(!texto.getText().trim().isEmpty())
             {
                Conectar cnx = new Conectar();
                cnx.acepta(Integer.parseInt(texto.getText()));
                 llenar();
                 
             }else{
                 Alert alert = new Alert(Alert.AlertType.WARNING);
            alert.setTitle("Ingrediente");
            alert.setHeaderText("Campos invalidos");
            alert.setContentText("LLene sus campos");

            alert.showAndWait();
             }
         
     }
      @FXML
       private void rechazar(ActionEvent event){
          if(!texto.getText().trim().isEmpty())
             {
                Conectar cnx = new Conectar();
                cnx.rechaza(Integer.parseInt(texto.getText()));
                 llenar();
             }else{
              Alert alert = new Alert(Alert.AlertType.WARNING);
                alert.setTitle("Ingrediente");
                alert.setHeaderText("Campos invalidos");
                alert.setContentText("LLene sus campos");

            alert.showAndWait();
          }
     }
    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {

        llenar();

    }

    @FXML
    private void llenar() {
        ObservableList<Producto> productos = FXCollections.observableArrayList();
        Conectar cnx = new Conectar();
        try {
            productos = cnx.tablaProductos();
        } catch (SQLException e) {
            System.out.println(e);
        }
        texto.setText("");
        id.setCellValueFactory(new PropertyValueFactory<>("id"));
        usuario.setCellValueFactory(new PropertyValueFactory<>("usuario"));
        producto.setCellValueFactory(new PropertyValueFactory<>("nombre"));
        precio.setCellValueFactory(new PropertyValueFactory<>("precio"));
        estado.setCellValueFactory(new PropertyValueFactory<>("estado"));
        cantidad.setCellValueFactory(new PropertyValueFactory<>("cantidad"));
        entrega.setCellValueFactory(new PropertyValueFactory<>("entrega"));
        pedidos.setItems(productos);
    }

}
