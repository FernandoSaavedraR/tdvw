/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package garnachas;

import java.net.URL;
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
import javafx.scene.control.ComboBox;
import javafx.scene.control.PasswordField;
import javafx.scene.control.TextField;
import javafx.stage.Stage;

/**
 * FXML Controller class
 *
 * @author yugi-
 */
public class RegistroController implements Initializable {

    @FXML
    private ComboBox<String> Sexo;
    @FXML
    private TextField nombre;
    @FXML
    private TextField apellidos;
    @FXML
    private TextField direccion;
    @FXML
    private TextField usuario;
    @FXML
    private PasswordField pass;
    @FXML
    private TextField Tarjeta;
    @FXML
    private TextField Banco;
    @FXML
    private TextField cvv;

    @Override
    public void initialize(URL url, ResourceBundle rb) {
        ObservableList<String> sexo = FXCollections.observableArrayList("Hombre", "Mujer");
        Sexo.getItems().clear();
        Sexo.setItems(sexo);
    }

    @FXML
    private void registrarse(ActionEvent event) {
        String name, lastN, dir, usr, password, number, bank, sexo;
        int code;
        try {
            name = nombre.getText();
            lastN = apellidos.getText();
            dir = direccion.getText();
            usr = usuario.getText();
            password = pass.getText();
            number = Tarjeta.getText();
            bank = Banco.getText();
            code = Integer.parseInt(cvv.getText());
            sexo = Sexo.getSelectionModel().getSelectedItem();
            if (name.trim().isEmpty() || lastN.trim().isEmpty() || dir.trim().isEmpty() || usr.trim().isEmpty() || password.trim().isEmpty()
                    || number.trim().isEmpty() || bank.trim().isEmpty()) {
                Alert alert = new Alert(Alert.AlertType.WARNING);
                alert.setTitle("Registro");
                alert.setHeaderText("Campos invalidos");
                alert.setContentText("LLene todos los campos");
                alert.showAndWait();
            } else {
                boolean sex = false;
                if (sexo == "Hombre") {
                    sex = true;
                }
                Conectar cnx = new Conectar();
                String ms = cnx.Alta_Pastelero(name, lastN, sex, usr, password, dir, number, code, bank);
                Alert alert = new Alert(Alert.AlertType.WARNING);
                alert.setTitle("Registro");
                alert.setHeaderText(ms);
                alert.showAndWait();
            }
        } catch (NumberFormatException e) {
            Alert alert = new Alert(Alert.AlertType.WARNING);
            alert.setTitle("Registro");
            alert.setHeaderText("Campos invalidos");
            alert.setContentText("cvv debe ser numerico");
            alert.showAndWait();
        } catch (NullPointerException e) {
            Alert alert = new Alert(Alert.AlertType.WARNING);
            alert.setTitle("Registro");
            alert.setHeaderText("Campos invalidos");
            alert.setContentText("Escoja un sexo");
            alert.showAndWait();
        }
    }
    @FXML
   private void inicioSesion (ActionEvent event) throws Exception {
        Parent root = FXMLLoader.load(getClass().getResource("FXMLDocument.fxml"));
        Scene scene = new Scene(root);
        Stage appStage = (Stage) ((Node) event.getSource()).getScene().getWindow();
        appStage.setScene(scene);
        appStage.toFront();
        appStage.show();     
   }

}
